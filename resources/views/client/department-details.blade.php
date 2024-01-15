@extends('client.layouts.master')
@section('metadata')
        <title>{{ $department->title }}</title>
        <meta name="description" content="{{ $department->description }}">
        <meta name="keywords" content="{{ $department->tags }}">
        <meta name="rsu.tilganga" content="Nepal's first refractive surgery unit for your laser vision correction.">
        <meta image="{{ env('APP_URL') . '/assets/images/logo-white.png' }}">
         <link rel="canonical"
            href="https://rsu.tilganga.org/" />
        <link rel="image_src" href="{{ env('APP_URL') . 'uploads/department/' . $department->image }}" />
        <meta property="og:determiner" content="An" />
        <meta property="og:site_name" content="RSU" />
        <meta property="og:type" content="Homepage" />
        <meta property="og:url" content="https://rsu.tilganga.org/" />
        <meta property="og:title" content="Home page" />
        <meta property="og:image" content="{{ env('APP_URL') . 'uploads/department/' . $department->image }}" />
        <meta property="og:image:width" content="960" />
        <meta property="og:image:height" content="400" />
        <meta property="og:locale" content="en_GB" />
@endsection
@section('client_content')

    <div class="page-title-area title-bg-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2> {{ $department->title }}</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <span>{{$department->department}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="department-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="details-item">
                        <img src="{{ asset(env('APP_URL') . '/uploads/blog/' . $department->filename) }}"
                        alt="{{ $department->title }}" class="department-image">
                        <ul>
                            <li>
                                <span> {{ $department->created_at->toDateString() }}</span>
                            </li>
                        </ul>
                        <h2>{{ $department->title }}</h2>
                        <p>{!! $department->description !!}</p>
                       
                    </div>
                </div>
              
            </div>
        </div>
    </div>
@endsection
