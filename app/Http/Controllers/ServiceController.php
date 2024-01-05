<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use File;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->get();
        return view('admin.service.list', compact('services'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.service.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        $slug = Str::slug($request->title, '-');

        if ($request->hasFile('image') && $request->hasFile('pdf_file')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/uploads/service', $name);

            $pdfName = $request->file('pdf_file')->getClientOriginalName();
            $request->file('pdf_file')->move(public_path() . '/uploads/service/pdf', $pdfName);
            $pdfFilePath = '/uploads/service/pdf/' . $pdfName;

            $service = new Service();
            $service->title = $request->title;
            $service->slug = $slug;
            $service->description = $request->description;
            $service->category = $request->category;
            $service->pdf_file = $pdfFilePath;
            $service->meta_title = $request->meta_title;
            $service->meta_description = $request->meta_description;
            $service->meta_keywords = $request->meta_keywords;
            $service->filename = $name;
            $save_service = $service->save();
            if ($save_service) {
                return redirect()->route('admin.service.list')->with('success', 'service has been added successfully.');
            } else {
                return back()->with('error', 'something went wrong');
            }
        } else {
            return back()->with('error', 'please choose an image');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $services = Service::orderBy('updated_at', 'desc')->get();
        $service = Service::where('slug', $slug)->first();
        return view('client.service-details')->with(['services' => $services, 'service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $service = Service::where("id",$id)->first();
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug = Str::slug($request->title, '-');
        $pdfFilePath = null;
        $imageFilePath = null;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFilePath = '/uploads/service/' . $image->getClientOriginalName();
            $image->move(public_path() . '/uploads/service', $image->getClientOriginalName());
        }
    
        if ($request->hasFile('pdf_file')) {
            $pdf = $request->file('pdf_file');
            $pdfFilePath = '/uploads/service/pdf/' . $pdf->getClientOriginalName();
            $pdf->move(public_path() . '/uploads/service/pdf', $pdf->getClientOriginalName());
        }
    
        $service = Service::find($id);
    
        if ($pdfFilePath) {
            // Delete the old PDF file if it exists
            if (File::exists(public_path($service->pdf_file))) {
                File::delete(public_path($service->pdf_file));
            }
            $service->pdf_file = $pdfFilePath;
        }
    
        if ($imageFilePath) {
            // Delete the old image file if it exists
            if (File::exists(public_path($service->filename))) {
                File::delete(public_path($service->filename));
            }
            $service->filename = $image->getClientOriginalName();
        }
    
        $service->title = $request->title;
        $service->slug = $slug;
        $service->description = $request->description;
        $service->category = $request->category;
        $service->meta_title = $request->meta_title;
        $service->meta_description = $request->meta_description;
        $service->meta_keywords = $request->meta_keywords;
    
        $save_service = $service->save();
    
        if ($save_service) {
            return redirect()->route('admin.service.list')->with('success', 'Service has been updated successfully.');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $filename = $service->filename;
        if (File::exists(public_path('uploads/service/' . $filename))) {
            File::delete(public_path('uploads/service/' . $filename));
        }
        $service->delete();
        return redirect()->route('admin.service.list')->with('success', 'service has been deleted successfully.');
    }

    public function serviceEditorUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->move(public_path() . '/uploads/editor/service', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/editor/service/' . $filenametostore);
            $message = 'File uploaded successfully';
            $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $result;
        }
    }
}
