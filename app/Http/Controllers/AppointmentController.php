<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formsData = Appointment::all();
        return view('admin.appointment.list', compact('formsData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'fullName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'time' => 'required',
            'date' => 'required',
            'message' => 'required',
            // 'captcha' => 'required|captcha', // this will validate captcha
        ]);

        $appointment = new Appointment();
        $appointment->fullName = $request->fullName;
        $appointment->time = $request->time;
        $appointment->date = $request->date;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->message = $request->message;
        $data_save = $appointment->save();
        if ($data_save) {
            $mailData = [
                'email' => $request->email,
                'fullname' => $request->fullName,
                'phone' => $request->phone,
                'time' => $request->time,
                'date' => $request->date,
                'message' => $request->message,
            ];
            Mail::to("isha.dt23@gmail.com")->send(new AppointmentMail($mailData));
            return redirect()->route('thankyou')->with('success', 'Form has been submmited successfully');
        } else {
            return back()->with('error', 'something went wrong');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment  = Appointment::find($id);
        $appointment->delete();
        return redirect()->route('admin.appointment.list')->with('success', 'form has been deleted');
    }

    public function getTodayAppointment()
    {
        $appointments = Appointment::all();
        $todayAppointments = [];

        $todayDate = date('Y-m-d'); // Get today's date in the "2023-08-31" format

        foreach ($appointments as $appointment) {
            $appointmentDate = date('Y-m-d', strtotime($appointment->created_at));

            if ($appointmentDate === $todayDate) {
                $todayAppointments[] = $appointment;
            }
        }
        return response()->json($todayAppointments);
    }
}
