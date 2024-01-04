<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentSlot;

class AppointmentSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = AppointmentSlot::all();
        return view('admin.appointmentslot.list', compact('slots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.appointmentslot.add');
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
            'day' => 'required',
            'from' => 'required',
            'to' => 'required',
            'step' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $slot = new AppointmentSlot();
        $slot->day = $request->day;
        $slot->from = $request->from;
        $slot->to = $request->to;
        $slot->step = $request->step;
        $slot->status = $request->status;

        if ($slot->save()) {
            return redirect()->route('admin.appointmentslot.list')->with('success', 'Appointment slot has been created successfully');
        } else {
            return back()->with('error', 'Something went wrong');
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
        $slot = AppointmentSlot::find($id);
        return  view('admin.appointmentslot.edit', compact('slot'));
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
            'day' => 'required',
            'from' => 'required',
            'to' => 'required',
            'step' => 'required|integer',
            'status' => 'required|boolean',
        ]);
    
        $slot = AppointmentSlot::find($id);
    
        if (!$slot) {
            return back()->with('error', 'Appointment slot not found');
        }
    
        $slot->day = $request->day;
        $slot->from = $request->from;
        $slot->to = $request->to;
        $slot->step = $request->step;
        $slot->status = $request->status;
    
        if ($slot->save()) {
            return redirect()->route('admin.appointmentslot.list')->with('success', 'Appointment slot has been updated successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
    public function destroy($id)
    {
        $slot  = AppointmentSlot::find($id);
        $slot->delete();
        return redirect()->route('admin.appointmentslot.list')->with('success', 'form has been deleted');
    }
}


