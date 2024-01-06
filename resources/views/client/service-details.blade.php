@extends('client.layouts.master')
@section('metadata')
    <title>{{ $service->title }}</title>
    <meta name="description" content="{{ $service->description }}">
    <meta name="keywords" content="{{ $service->tags }}">
    <meta name="rsu.tilganga" content="Nepal's first refractive surgery unit for your laser vision correction.">
    <meta image="{{ env('APP_URL') . '/assets/images/logo-white.png' }}">
    <link rel="canonical" href="https://rsu.tilganga.org/" />
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
                                <a href="{{ route('home') }}">Home</a>
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
                        @if ($service->pdf_file)
                            <a href="{{ env('APP_URL') . $service->pdf_file }}" target="_blank">
                                View PDF
                            </a>
                        @else
                            No PDF available
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="categories widget-item">
                            <h3>Categories</h3>
                            <ul>
                                @foreach ($services as $service)
                                    <li>
                                        <a
                                            href="{{ route('service.details', ['slug' => $service->slug]) }}">{{ $service->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
