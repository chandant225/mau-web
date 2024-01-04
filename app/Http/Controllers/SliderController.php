<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'desc')->get();
        return view('admin.slider.list',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.slider.add');
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

        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/slider',$name);
            $slider = new Slider();
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->filename = $name;
            $save_slider = $slider->save();
            if($save_slider){
                return redirect()->route('admin.slider.list')->with('success','slider has been added successfully.');
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
        // $slider = Slider::where("id",$id)->first();
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/slider',$name);
            $slider = Slider::find($id);
            $filename = $slider->filename;
            if (File::exists(public_path('uploads/slider/'.$filename))) {
               File::delete(public_path('uploads/slider/'.$filename));
               }
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->filename = $name;
            $save_slider = $slider->save();
            if($save_slider){
                return redirect()->route('admin.slider.list')->with('success','slider has been updated successfully.');
            }else {
                return back()->with('error','something went wrong');
            }
        }else {
            $slider = Slider::find($id);
            $filename = $slider->filename;
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->filename = $filename;
            $save_slider = $slider->save();
            if($save_slider){
                return redirect()->route('admin.slider.list')->with('success','slider has been updated successfully.');
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
        $slider = Slider::find($id);
        $filename = $slider->filename;
     if (File::exists(public_path('uploads/slider/'.$filename))) {
        File::delete(public_path('uploads/slider/'.$filename));
      }
        $slider->delete();
        return redirect()->route('admin.slider.list')->with('success','slider has been deleted successfully.');
    }
}
