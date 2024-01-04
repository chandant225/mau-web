<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formsData = Contact::all();
        return view('admin.contact.list',compact('formsData'));
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
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone'=>'required',
            'message' => 'required',
            // 'captcha' => 'required|captcha', // this will validate captcha
        ]);

        $contact = new Contact();
        $contact->firstName = $request->firstName;
        $contact->lastName = $request->lastName;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $data_save = $contact->save();
        if($data_save){
               $mailData = [
                'email' => $request->email,
                'fullname'=> $request->firstName . " " . $request->lastName, 
                'phone'=> $request->phone,
                'message'=> $request->message,
            ];
          Mail::to("isha.dt23@gmail.com")->send(new ContactMail($mailData));
          return redirect('/thank-you')->with('success','Form has been submmited successfully');
        }else {
            return back()->with('error','something went wrong');
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
        $contact  = Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact.list')->with('success','form has been deleted');
    }
}
