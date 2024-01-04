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
    <div class="page-title-area title-bg-two">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Services</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <span>Services</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="services-area ptb-100">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Services</span>
                    <span class="sub-title">Services</span>
                </div>
                <h2>Eye Care Services</h2>
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
                                    <a
                                        href="{{ route('service.details', ['slug' => $service->slug]) }}">{{ $service->title }}</a>
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
@endsection
