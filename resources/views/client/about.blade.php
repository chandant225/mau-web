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
    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>About Us</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <span>About Us</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-area two pt-100 pb-70">
        <div class="about-shape">
            <img src="assets/images/about/shape1.png" alt="Shape">
            <img src="assets/images/about/shape2.png" alt="Shape">
        </div>
        <div class="container">
            <div class="row align-items-end">
                @foreach ($abouts as $about)
                    @if (isset($about))
                        <div class="col-lg-12">
                            <div class="about-image">
                                <img src="{{ env('APP_URL') . '/uploads/about/' . $about->filename }}"
                                    alt="{{ $about->title }}" />
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="about-content">
                                <div class="section-title">
                                    <div class="top">
                                        <span class="top-title">About Us</span>
                                        <span class="sub-title">About Us</span>
                                    </div>
                                    <h2>{{ $about->title }}</h2>
                                    <p> {!! $about->description !!}</p>
                                </div>
                               
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <section class="services-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Services</span>
                    <span class="sub-title">Services</span>
                </div>
                <h2>Refractive Surgery Unit</h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($services as $service)
                    <div class="col-sm-6 col-lg-4">
                        <div class="services-item">
                            <div class="top">
                                <a href="{{ route('service.details', ['slug' => $service->slug]) }}">
                                    <img src="{{ env('APP_URL') . '/uploads/service/' . $service->filename }}"
                                        alt="">
                                </a>
                            </div>
                            <div class="bottom">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <i class="flaticon-lasik icon"></i>
                                <h3>
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}">{{ $service->title }}</a>
                                </h3>
                                <p>
                                    {!! Str::words($service->description, 8, ' ...') !!}
                                </p>
                                <div class="service-btn">
                                    <a
                                        href="{{ route('service.details', ['slug' => $service->slug]) }}">
                                        More Details
                                        <i class="bx bx-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="doctors-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Teams</span>
                    <span class="sub-title">Teams</span>
                </div>
                <h2>Eye Care Specialist</h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-sm-6 col-lg-4">
                        <div class="doctors-item">
                            <div class="top">
                                <img src="{{ env('APP_URL') . '/uploads/team/' . $team->image }}" class="img-responsive"
                                    alt="{{ $team->name }}">
                            </div>
                            <div class="bottom">
                                <div class="right">
                                    <h3>
                                        <a href="doctor-details.html"> {{ $team->name }}</a>
                                    </h3>
                                    <span>{{ $team->designation }}</span>
                                    <a class="common-btn mt-3"
                                        href="{{ route('doctor.details', ['slug' => $team->slug]) }}">
                                        <span class="one"></span>
                                        <span class="two"></span>
                                        VIEW PROFILE
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
