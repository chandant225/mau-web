<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;
use File;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = Counter::orderBy('created_at', 'desc')->get();
        return view('admin.counter.list', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.counter.add');
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
            'number' => 'required'
        ]);

        if ($request->hasfile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/uploads/counter', $name);
            $counter = new Counter();
            $counter->title = $request->title;
            $counter->number = $request->number;
            $counter->image = $name;
            $save_counter = $counter->save();
            if ($save_counter) {
                return redirect()->route('admin.counter.list')->with('success', 'counter has been added successfully.');
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
        $counter = Counter::find($id);
        return view('admin.counter.edit', compact('counter'));
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
        if ($request->hasfile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/uploads/counter', $name);
            $counter = Counter::find($id);
            $image = $counter->image;
            if (File::exists(public_path('uploads/counter/' . $image))) {
                File::delete(public_path('uploads/counter/' . $image));
            }
            $counter->title = $request->title;
            $counter->number = $request->number;
            $counter->image = $name;
            $save_counter = $counter->save();
            if ($save_counter) {
                return redirect()->route('admin.counter.list')->with('success', 'counter has been updated successfully.');
            } else {
                return back()->with('error', 'something went wrong');
            }
        } else {
            $counter = Counter::find($id);
            $image = $counter->image;
            $counter->title = $request->title;
            $counter->number = $request->number;
            $counter->image = $image;
            $save_counter = $counter->save();
            if ($save_counter) {
                return redirect()->route('admin.counter.list')->with('success', 'counter has been updated successfully.');
            } else {
                return back()->with('error', 'something went wrong');
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
        $counter = Counter::find($id);
        $filename = $counter->filename;
        if (File::exists(public_path('uploads/counter/' . $filename))) {
            File::delete(public_path('uploads/counter/' . $filename));
        }
        $counter->delete();
        return redirect()->route('admin.counter.list')->with('success', 'counter has been deleted successfully.');
    }

    public function updateCountersManually()
    {
        $counters = Counter::all();
        foreach ($counters as $counter) {
            if ($counter->title === 'Refractive Patient Screened') {
                $sevenDaysAgo = Carbon::now()->subDays(7);

                if ($counter->updated_at >= $sevenDaysAgo) {
                    $counter->number += 46;
                    $counter->save();
                }
            }
        }
        return response()->json(['message' => 'Counters updated successfully']);
    }
}
