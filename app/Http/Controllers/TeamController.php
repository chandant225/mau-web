<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.team.list',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.add');
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
            'designation'=>'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif | max:5000',
            'description'=> 'required',
            'status' => 'required'
        ]);
        
        $slug = Str::slug($request->name,'-');
        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/team',$name);
            $team = new Team();
            $team->name = $request->name;
            $team->slug = $slug;
            $team->designation = $request->designation;
            $team->description = $request->description;
            $team->linkdin = $request->linkdin;
            $team->position = $request->position;
            $team->image = $name;
            $team->status = $request->status;
            $save_team = $team->save();
            if($save_team){
                return redirect()->route('admin.team.list')->with('success','team has been added successfully.');
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
    public function show($slug)
    {
        $teams = Team::orderBy('updated_at','desc')->get();
       $team = Team::where('slug', $slug)->first();
       return view('client.doctor-details')->with(['teams' => $teams, 'team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.team.edit',compact('team'));
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
        $slug = Str::slug($request->name,'-');
        if($request->hasfile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path(). '/uploads/team',$name);
            $team = Team::find($id);
            $filename = $team->image;
            if (File::exists(public_path('uploads/team/'.$filename))) {
               File::delete(public_path('uploads/team/'.$filename));
               }
               $team->name = $request->name;
               $team->slug = $slug;
               $team->designation = $request->designation;
               $team->description = $request->description;
               $team->linkdin = $request->linkdin;
               $team->position = $request->position;
               $team->image = $name;
               $team->status = $request->status;
               $save_team = $team->save();
               if($save_team){
                   return redirect()->route('admin.team.list')->with('success','team has been added successfully.');
               }else {
                   return back()->with('error','something went wrong');
               }
        }else {
            $team = Team::find($id);
            $filename = $team->image;
            $team->name = $request->name;
            $team->slug = $slug;
            $team->designation = $request->designation;
            $team->linkdin = $request->linkdin;
            $team->description = $request->description;
            $team->position = $request->position;
            $team->image = $filename;
            $team->status = $request->status;
            $save_team = $team->save();
            if($save_team){
                return redirect()->route('admin.team.list')->with('success','team has been updated successfully.');
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
        $team = Team::find($id);
        $filename = $team->image;
     if (File::exists(public_path('uploads/team/'.$filename))) {
        File::delete(public_path('uploads/team/'.$filename));
      }
        $team->delete();
        return redirect()->route('admin.team.list')->with('success','team has been deleted successfully.');
    }
}
