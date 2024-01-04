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


    <div class="page-title-area title-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>News & Update</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <span>News & Update</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="blog-area ptb-100">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Latest News</span>
                    <span class="sub-title">News & Blog</span>
                </div>
                <h2> Latest News From Our Blog</h2>
            </div>
            <div class="row justify-content-center">
                @if (count($blogs) == 0)
                <div class="intro">
                    <h1 class="text-center">There is no any News & Update uploaded yet.</h1>
                </div>
            @elseif(count($blogs) > 0)
                <div class="row justify-content-center">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-sm-6">
                            <div class="blog-item">
                                <div class="top">
                                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                                        <img src="{{ asset(env('APP_URL') . '/uploads/blog/' . $blog->filename) }}"
                                            alt="{{ $blog->title }}">
                                    </a>
                                </div>
                                <div class="bottom">
                                    <h3>
                                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p> {!! Str::words($blog->description, 11, ' ...') !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            </div>
           
        </div>
    </section>
@endsection
