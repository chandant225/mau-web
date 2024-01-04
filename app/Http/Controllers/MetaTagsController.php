<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaTags;
use File;
use Illuminate\Support\Str;

class MetaTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metatags = MetaTags::orderBy('created_at', 'desc')->get();
        return view('admin.metatag.list',compact('metatags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.metatag.add'); 
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
            $request->file('image')->move(public_path(). '/uploads/metatag',$name);
            $metaData = new MetaTags();
            $metaData->title = $request->title;
            $metaData->description = $request->description;
            $metaData->image = $name;
            $metaData->tags = $request->tags;
            $metaData->page = $request->page;
            $save_metaData = $metaData->save();
            if($save_metaData){
                return redirect()->route('admin.metatag.list')->with('success','metaData has been added successfully.');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metaData = MetaTags::find($id);
        return view('admin.metatag.edit',compact('metaData'));
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
            $request->file('image')->move(public_path(). '/uploads/metatag',$name);
            $metatag = MetaTags::find($id);
            $filename = $metatag->image;
            if (File::exists(public_path('uploads/metatag/'.$filename))) {
               File::delete(public_path('uploads/metatag/'.$filename));
               }
            $metatag->title = $request->title;
            $metatag->description = $request->description;
            $metatag->image = $name;
            $metatag->tags = $request->tags;
            $metatag->page = $request->page;
            $save_metatag = $metatag->save();
            if($save_metatag){
                return redirect()->route('admin.metatag.list')->with('success','metatag has been updated successfully.');
            }else {
                return back()->with('error','something went wrong');
            }
        }else {
            $metatag = MetaTags::find($id);
            $filename = $metatag->image;
            $metatag->title = $request->title;
            $metatag->description = $request->description;
            $metatag->image = $filename;
            $metatag->tags = $request->tags;
            $metatag->page = $request->page;
            $save_metatag = $metatag->save();
            if($save_metatag){
                return redirect()->route('admin.metatag.list')->with('success','metatag has been updated successfully.');
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
        $metatag = MetaTags::find($id);
        $filename = $metatag->image;
     if (File::exists(public_path('uploads/metatag/'.$filename))) {
        File::delete(public_path('uploads/metatag/'.$filename));
      }
        $metatag->delete();
        return redirect()->route('admin.metatag.list')->with('success','metatag has been deleted successfully.');
    }
}
