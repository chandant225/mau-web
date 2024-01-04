<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.list',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.add');
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
            'name'=> 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif | max:5000',
            'description'=> 'required',
            'status' => 'required'
        ]);
        

        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/testimonial',$name);
            $testimonial = new Testimonial();
            $testimonial->name = $request->name;
            $testimonial->profession = $request->profession;
            $testimonial->description = $request->description;
            $testimonial->image = $name;
            $testimonial->status = $request->status;
            $save_testimonial = $testimonial->save();
            if($save_testimonial){
                return redirect()->route('admin.testimonial.list')->with('success','testimonial has been added successfully.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit',compact('testimonial'));
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
            $request->file('image')->move(public_path(). '/uploads/testimonial',$name);
            $testimonial = Testimonial::find($id);
            $filename = $testimonial->image;
            if (File::exists(public_path('uploads/testimonial/'.$filename))) {
               File::delete(public_path('uploads/testimonial/'.$filename));
               }
               $testimonial->name = $request->name;
               $testimonial->profession = $request->profession;
               $testimonial->description = $request->description;
               $testimonial->image = $name;
               $testimonial->status = $request->status;
               $save_testimonial = $testimonial->save();
               if($save_testimonial){
                   return redirect()->route('admin.testimonial.list')->with('success','testimonial has been added successfully.');
               }else {
                   return back()->with('error','something went wrong');
               }
        }else {
            $testimonial = Testimonial::find($id);
            $filename = $testimonial->image;
            $testimonial->name = $request->name;
            $testimonial->profession = $request->profession;
            $testimonial->description = $request->description;
            $testimonial->image = $filename;
            $testimonial->status = $request->status;
                $save_testimonial = $testimonial->save();
            if($save_testimonial){
                return redirect()->route('admin.testimonial.list')->with('success','testimonial has been updated successfully.');
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
        $testimonial = Testimonial::find($id);
        $filename = $testimonial->image;
     if (File::exists(public_path('uploads/testimonial/'.$filename))) {
        File::delete(public_path('uploads/testimonial/'.$filename));
      }
        $testimonial->delete();
        return redirect()->route('admin.testimonial.list')->with('success','testimonial has been deleted successfully.');
    }
}
