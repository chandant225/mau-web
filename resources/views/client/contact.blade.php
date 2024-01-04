@extends('client.layouts.master')

@section('metadata')
    @if (isset($metatag))
        <title>{{ $metatag->title }}</title>
        <meta name="description" content="{{ $metatag->description }}">
        <meta name="keywords" content="{{ $metatag->tags }}">
        <meta name="rsu" content="Nepal's first refractive surgery unit for your laser vision correction.">
        <link rel="image_src" href="{{ env('APP_URL') . 'uploads/metatag/' . $metatag->image }}" />
        <meta property="og:image" content="{{ env('APP_URL') . 'uploads/metatag/' . $metatag->image }}" />
    @endif
@endsection
@section('client_content')
    <div class="page-title-area title-bg-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Contact</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <span>Contact</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-info-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                @if (isset($profile))
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-info-item">
                        <i class='bx bx-phone-call'></i>
                        <h3>Phone Number</h3>
                        <a href="tel:{{$profile->phone}}">{{$profile->phone}}</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-info-item">
                        <i class='bx bx-mail-send'></i>
                        <h3>Email Address</h3>
                        <a
                            href="mailto: {{$profile->email}}"><span
                               > {{$profile->email}}</span></a>
                       
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="contact-info-item">
                        <i class='bx bx-location-plus'></i>
                        <h3>Location</h3>
                        <a href="https://www.google.com/maps/place/Tilganga+Institute+of+Ophthalmology/@27.705612,85.350454,17z/data=!4m6!3m5!1s0x39eb1981f114d961:0xd4b4f33375050e34!8m2!3d27.7056123!4d85.3504537!16s%2Fm%2F0yp28xq?hl=en&entry=ttu"
                            target="_blank">{{$profile->address}}</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>


    <div class="contact-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="map-item">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3532.3780342126056!2d85.350454!3d27.705612!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1981f114d961%3A0xd4b4f33375050e34!2sTilganga%20Institute%20of%20Ophthalmology!5e0!3m2!1sen!2snp!4v1690535290188!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form id="contactform" method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <h3>Contact With Us!</h3>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="firstName" id="firstName" class="form-control"
                                        placeholder="First Name" required data-error="Please enter your first name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="lastName" id="lastName" class="form-control"
                                        placeholder="Last Name" required data-error="Please enter your last name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone_number" placeholder="Phone" required
                                        data-error="Please enter your number" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Write message"
                                        required data-error="Write your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="form-check agree-label">
                                        <input name="gridCheck" value="I agree to the terms and privacy policy."
                                            class="form-check-input" type="checkbox" id="gridCheck" required>
                                        <label class="form-check-label" for="gridCheck">
                                            Accept <a href="terms-conditions.html">Terms & Conditions</a> And <a
                                                href="privacy-policy.html">Privacy Policy.</a>
                                        </label>
                                        <div class="help-block with-errors gridCheck-error"></div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <button type="submit" class="btn common-btn">
                                        <span class="one"></span>
                                        <span class="two"></span>
                                        Send Message
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
