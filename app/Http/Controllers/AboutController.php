<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use File;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::orderBy('created_at', 'desc')->get();
        return view('admin.about.list',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abouts = About::orderBy('created_at', 'desc')->get();
        return  view('admin.about.add',compact('abouts'));
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
            'title'=> 'required',
            'description'=> 'required',
            'status'=>'required',
        ]);

        $slug = Str::slug($request->title,'-');

        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/about',$name);
            $about = new About();
            $about->title = $request->title;
            $about->slug = $slug;
            $about->description = $request->description;
            $about->status = $request->status;
            $about->filename = $name;
            $save_about = $about->save();
            if($save_about){
                return redirect()->route('admin.about.list')->with('success','about has been added successfully.');
            }else {
                return back()->with('error','something went wrong');
            }
        }else {
            return back()->with('error','please choose an image');
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
       $about = About::where('slug', $slug)->first();
       return view('client.about')->with([ 'about' => $about]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $about = about::where("id",$id)->first();
        $about = About::find($id);
        $abouts = About::orderBy('created_at', 'desc')->get();
        return view('admin.about.edit',compact('about','abouts'));
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
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'status'=>'required',
        ]);

        $slug = Str::slug($request->title,'-');
        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/about',$name);
            $about = About::find($id);
            $filename = $about->filename;
            if (File::exists(public_path('uploads/about/'.$filename))) {
               File::delete(public_path('uploads/about/'.$filename));
               }
            $about->title = $request->title;
            $about->slug = $slug;
            $about->description = $request->description;
            $about->status = $request->status;
            $about->filename = $name;
            $save_about = $about->save();
            if($save_about){
                return redirect()->route('admin.about.list')->with('success','about has been updated successfully.');
            }else {
                return back()->with('error','something went wrong');
            }
        }else {
            $about = About::find($id);
            $filename = $about->filename;
            $about->title = $request->title;
            $about->slug = $slug;
            $about->description = $request->description;
            $about->filename = $filename;
            $about->status = $request->status;
            $save_about = $about->save();
            if($save_about){
                return redirect()->route('admin.about.list')->with('success','about has been updated successfully.');
            }else {
                return back()->with('error','something went wrong');
            }
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
        $about = About::find($id);
        $filename = $about->filename;
     if (File::exists(public_path('uploads/about/'.$filename))) {
        File::delete(public_path('uploads/about/'.$filename));
      }
        $about->delete();
        return redirect()->route('admin.about.list')->with('success','about has been deleted successfully.');
    }

    // public function aboutEditorUpload (Request $request) 
    // {
    //       if($request->hasFile('upload')) {
    //         //get filename with extension
    //         $filenamewithextension = $request->file('upload')->getClientOriginalName();

    //         //get filename without extension
    //         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

    //         //get file extension
    //         $extension = $request->file('upload')->getClientOriginalExtension();

    //         //filename to store
    //         $filenametostore = $filename.'_'.time().'.'.$extension;

    //         //Upload File
    //         $request->file('upload')->move(public_path().'/uploads/editor/about', $filenametostore);

    //         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
    //         $url = asset('uploads/editor/about/'.$filenametostore);
    //         $message = 'File uploaded successfully';
    //         $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";

    //         // Render HTML output
    //         @header('Content-type: text/html; charset=utf-8');
    //         echo $result;
    //     }
    // }
}
