<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Profile;
use File;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.list',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.profile.add');
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
            'email'=> 'required',
            'address'=> 'required',
            'phone'=> 'required',
            'facebookLink'=> 'required',
            'twitterLink'=> 'required',
            'linkdinlink'=> 'required'
        ]);
        

        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/profile',$name);
            $profile = new Profile();
            $profile->email = $request->email;
            $profile->address = $request->address;
            $profile->phone =  $request->phone;
            $profile->facebookLink = $request->facebookLink;
            $profile->twitterLink = $request->twitterLink;
            $profile->linkdinlink = $request->linkdinlink;
            $profile->image = $name;
            $save_profile = $profile->save();
            if($save_profile){
                return redirect()->route('admin.profile.list')->with('success','profile has been added successfully.');
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
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::where('id', $id)->first();
        return view('admin.profile.edit',compact('profile'));
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
            $request->file('image')->move(public_path(). '/uploads/profile',$name);
            $profile = Profile::find($id);
            $image = $profile->image;
            if (File::exists(public_path('uploads/profile/'.$image))) {
               File::delete(public_path('uploads/profile/'.$image));
               }
               $profile->email = $request->email;
               $profile->address = $request->address;
               $profile->phone =  $request->phone;
               $profile->facebookLink = $request->facebookLink;
               $profile->twitterLink = $request->twitterLink;
               $profile->linkdinlink = $request->linkdinlink;
            $profile->image = $name;
            $save_profile = $profile->save();
            if($save_profile){
                return redirect()->route('admin.profile.list')->with('success','profile has been updated successfully.');
            }else {
                return back()->with('error','something went wrong');
            }
        }else {
            $profile = Profile::find($id);
            $image = $profile->image;
            $profile->email = $request->email;
            $profile->address = $request->address;
            $profile->phone =  $request->phone;
            $profile->facebookLink = $request->facebookLink;
            $profile->twitterLink = $request->twitterLink;
            $profile->linkdinlink = $request->linkdinlink;
            $profile->image = $image;
            $save_profile = $profile->save();
            if($save_profile){
                return redirect()->route('admin.profile.list')->with('success','profile has been updated successfully.');
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
        $profile = Profile::find($id);
        $filename = $profile->filename;
     if (File::exists(public_path('uploads/profile/'.$filename))) {
        File::delete(public_path('uploads/profile/'.$filename));
      }
        $profile->delete();
        return redirect()->route('admin.profile.list')->with('success','profile has been deleted successfully.');
    }
}
