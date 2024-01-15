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
                                <a href="{{ route('home') }}">Home</a>
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
                    @if ($loop->iteration % 2 == 0)
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="{{ env('APP_URL') . '/uploads/about/' . $about->filename }}"
                                    alt="{{ $about->title }}" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title">
                                    <div class="top">
                                        <span class="top-title">About Us</span>
                                        <span class="sub-title">About Us</span>
                                    </div>
                                    <h2>{{ $about->title }}</h2>
                                    <p> {!! Str::words($about->description, 100, ' ...') !!}</p>
                                </div>
                                <a class="common-btn" href="{{ route('about') }}">
                                    <span class="one"></span>
                                    <span class="two"></span>
                                    More About Us
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title">
                                    <div class="top">
                                        <span class="top-title">About Us</span>
                                        <span class="sub-title">About Us</span>
                                    </div>
                                    <h2>{{ $about->title }}</h2>
                                    <p> {!! Str::words($about->description, 100, ' ...') !!}</p>
                                </div>
                                <a class="common-btn" href="{{ route('about') }}">
                                    <span class="one"></span>
                                    <span class="two"></span>
                                    More About Us
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="{{ env('APP_URL') . '/uploads/about/' . $about->filename }}"
                                    alt="{{ $about->title }}" />
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <section class="doctors-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Officials</span>
                    <span class="sub-title">Officials</span>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-sm-6 col-lg-3">
                        <div class="doctors-item">
                            <div class="top">
                                <img src="{{ env('APP_URL') . '/uploads/team/' . $team->image }}"
                                    class="img-responsive rounded" alt="{{ $team->name }}">
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
