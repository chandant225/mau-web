@extends('client.layouts.master')


@section('client_content')
<!-- Start Banner -->
<section class="inner-banner appointment-banner">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="content">
            <h1>Appointment FORM</h1>
          </div>
        </div>      
      </div>
    </div>
  </section>
  <!-- End Banner --> 
  
  <!-- Start Contact Us -->
  <div class="form-wrapper padding-lg">
    <div class="container">
      <form method="POST" action="{{ route('contact.store') }}">
        @csrf
        <div class="row input-row">
            <div class="col-sm-6 pb-5">
                <input name="firstName" type="text" placeholder="FIRST NAME*" required />
            </div>
            <div class="col-sm-6">
                <input name="lastName" type="text" placeholder="LAST NAME*">
            </div>
            <div class="col-sm-6">
                <input name="email" type="text" placeholder="EMAIL*">
            </div>
     
            <div class="col-sm-6">
                <input name="phone" type="text" placeholder="PHONE*">
            </div>
        </div>
        <div class="row input-row">
            <div class="col-sm-12">
                <textarea name="message" placeholder="MESSAGE"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input type="submit" name="submit" class="btn btn-success btn-send" value="SUBMIT">
                <div class="msg"></div>
            </div>
        </div>
    </form>
    </div>
  </div>
  <!-- end Contact Us -->
@endsection