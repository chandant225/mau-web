@extends('client.layouts.master')

@section('metadata')
    @if (isset($metatag))
        <title>{{ $metatag->title }}</title>
        <meta name="description" content="{{ $metatag->description }}">
        <meta name="keywords" content="{{ $metatag->tags }}">
        <meta name="jadanconstruction" content="a construction company">
        <link rel="image_src" href="{{ env('APP_URL') . 'uploads/metatag/' . $metatag->image }}" />
        <meta property="og:image" content="{{ env('APP_URL') . 'uploads/metatag/' . $metatag->image }}" />
    @endif
@endsection
@section('client_content')
   <!-- Start Banner -->
   <div class="page-title-area title-bg-one">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-content">
                    <h2>Gallery</h2>
                    <ul>
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li>
                            <span>Gallery</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

    <section>
        <div class="container mb-3">
            @if (count($albums) == 0)
                <div class="intro">
                    <h1 class="text-primary fw-bold">There is no any gallery yet.</h1>
                </div>
            @elseif(count($albums) > 0)
                <div class="row pb-3">
                    @foreach ($albums as $gallery)
                        <div class="col-lg-4">
                            <div class="g-image-wrapper shadow mt-3">
                                <img style="object-fit: cover;"
                                    src="{{ asset(env('APP_URL') . '/uploads/gallery/cover/' . $gallery->cover_image) }}"
                                    alt="{{ $gallery->title }}" class=" rounded w-100" />
                                <div style="text-align: center" class="overlay-wrapper">
                                    <div class="overlay-text p-3">
                                        <p>{{ $gallery->title }}</p>
                                            <a class="common-btn" href="{{ route('gallery.show', ['slug' => $gallery->slug]) }}">
                                                <span class="one"></span>
                                                <span class="two"></span>
                                                View images
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- {!! $albums->links() !!} --}}
            @endif
        </div>
    </section>
  
@endsection
