@extends('client.layouts.master')
@section('metadata')
        <title>{{ $blog->title }}</title>
        <meta name="description" content="{{ $blog->description }}">
        <meta name="keywords" content="{{ $blog->tags }}">
        <meta name="rsu.tilganga" content="Nepal's first refractive surgery unit for your laser vision correction.">
        <meta image="{{ env('APP_URL') . '/assets/images/logo-white.png' }}">
         <link rel="canonical"
            href="https://rsu.tilganga.org/" />
        <link rel="image_src" href="{{ env('APP_URL') . 'uploads/blog/' . $blog->image }}" />
        <meta property="og:determiner" content="An" />
        <meta property="og:site_name" content="RSU" />
        <meta property="og:type" content="Homepage" />
        <meta property="og:url" content="https://rsu.tilganga.org/" />
        <meta property="og:title" content="Home page" />
        <meta property="og:image" content="{{ env('APP_URL') . 'uploads/blog/' . $blog->image }}" />
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
                        <h2> {{ $blog->title }}</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <span>Blog Details</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details-item">
                        <img src="{{ asset(env('APP_URL') . '/uploads/blog/' . $blog->filename) }}"
                        alt="{{ $blog->title }}" class="blog-image">
                        <ul>
                            <li>
                                <span> {{ $blog->created_at->toDateString() }}</span>
                            </li>
                           
                        </ul>
                        <h2>{{ $blog->title }}</h2>
                        <p>{!! $blog->description !!}</p>
                       
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="post widget-item">
                            <h3>Popular Post</h3>
                            
                            <div class="inner ">
                                @foreach($blogs as $blog)
                                <ul class="align-items-center mt-4">
                                    <li>
                                        <img src="{{ asset(env('APP_URL') . '/uploads/blog/' . $blog->filename) }}"
                                        alt="{{ $blog->title }}" class="blog-image">
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                        <span>{{ $blog->created_at->toDateString() }}</span>
                                    </li>
                                </ul>
                                @endforeach
                            </div>
                          
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
