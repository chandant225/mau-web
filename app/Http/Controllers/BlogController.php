<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('admin.blog.list',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.blog.add');
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
            'description'=> 'required'
        ]);
        
        $slug = Str::slug($request->title,'-');

        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/blog',$name);
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->slug = $slug;
            $blog->description = $request->description;
            $blog->department = $request->department;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            $blog->meta_keywords = $request->meta_keywords;
            $blog->filename = $name;
            $save_blog = $blog->save();
            if($save_blog){
                return redirect()->route('admin.blog.list')->with('success','blog has been added successfully.');
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
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $blogs = Blog::orderBy('updated_at','desc')->get();
       $blog = Blog::where('slug', $slug)->first();
       return view('client.blog-details')->with(['blogs' => $blogs, 'blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $blog = Blog::where("id",$id)->first();
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
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
         $slug = Str::slug($request->title,'-');
        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/blog',$name);
            $blog = Blog::find($id);
            $filename = $blog->filename;
            if (File::exists(public_path('uploads/blog/'.$filename))) {
               File::delete(public_path('uploads/blog/'.$filename));
               }
            $blog->title = $request->title;
            $blog->slug = $slug;
            $blog->description = $request->description;
            $blog->department = $request->department;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            $blog->meta_keywords = $request->meta_keywords;
            $blog->filename = $name;
            $save_blog = $blog->save();
            if($save_blog){
                return redirect()->route('admin.blog.list')->with('success','blog has been updated successfully.');
            }else {
                return back()->with('error','something went wrong');
            }
        }else {
            $blog = Blog::find($id);
            $filename = $blog->filename;
            $blog->title = $request->title;
            $blog->slug = $slug;
            $blog->description = $request->description;
            $blog->department = $request->department;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            $blog->meta_keywords = $request->meta_keywords;
            $blog->filename = $filename;
            $save_blog = $blog->save();
            if($save_blog){
                return redirect()->route('admin.blog.list')->with('success','blog has been updated successfully.');
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
        $blog = Blog::find($id);
        $filename = $blog->filename;
     if (File::exists(public_path('uploads/blog/'.$filename))) {
        File::delete(public_path('uploads/blog/'.$filename));
      }
        $blog->delete();
        return redirect()->route('admin.blog.list')->with('success','blog has been deleted successfully.');
    }

     public function blogEditorUpload (Request $request) 
    {
          if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move(public_path().'/uploads/editor/blog', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/editor/blog/'.$filenametostore);
            $message = 'File uploaded successfully';
            $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $result;
        }
    }
}
