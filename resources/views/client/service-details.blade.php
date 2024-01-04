@extends('client.layouts.master')
@section('metadata')
        <title>{{ $service->title }}</title>
        <meta name="description" content="{{ $service->description }}">
        <meta name="keywords" content="{{ $service->tags }}">
        <meta name="rsu.tilganga" content="Nepal's first refractive surgery unit for your laser vision correction.">
        <meta image="{{ env('APP_URL') . '/assets/images/logo-white.png' }}">
         <link rel="canonical"
            href="https://rsu.tilganga.org/" />
        <link rel="image_src" href="{{ env('APP_URL') . 'uploads/service/' . $service->image }}" />
        <meta property="og:determiner" content="An" />
        <meta property="og:site_name" content="RSU" />
        <meta property="og:type" content="Homepage" />
        <meta property="og:url" content="https://rsu.tilganga.org/" />
        <meta property="og:title" content="Home page" />
        <meta property="og:image" content="{{ env('APP_URL') . 'uploads/service/' . $service->image }}" />
        <meta property="og:image:width" content="960" />
        <meta property="og:image:height" content="400" />
        <meta property="og:locale" content="en_GB" />
@endsection
@section('client_content')

    <div class="page-title-area title-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>{{ $service->title }}</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <span>Service Details</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details-item">
                        <img class="pb-2" src="{{ env('APP_URL') . '/uploads/service/' . $service->filename }}"
                        alt="Post Operative Lasik Care" />
                        <h2>{{ $service->title }}</h2>
                        <p>{!! $service->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="categories widget-item">
                            <h3>Categories</h3>
                            <ul>
                                @foreach($services as $service)                                    
                                
                                <li>
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}" >{{ $service->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                     
                        <div class="consult widget-item">
                            <h3>Get A Consult</h3>
                            <form method="POST" action="{{ route('appointment') }}">
                                @csrf              
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="fullName" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Your Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="time" name="time" class="form-control" placeholder="Your Time">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input id="datetimepicker" name="date" type="text" class="form-control"
                                                placeholder="Appointment Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea id="your-message" name="message" rows="8" class="form-control" placeholder="Write Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn common-btn">
                                            Get An Appointment
                                            <span class="one"></span>
                                            <span class="two"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
