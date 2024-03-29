@extends('client.layouts.master')
@section('metadata')
    @if (isset($metatag))
        <title>{{ $metatag->title }}</title>
        <meta name="description" content="{{ $metatag->description }}">
        <meta name="keywords" content="{{ $metatag->tags }}">
        <meta name="rsu.tilganga" content="Nepal's first refractive surgery unit for your laser vision correction.">
        <meta image="{{ env('APP_URL') . '/assets/images/logo-white.png' }}">
        <link rel="canonical" href="https://rsu.tilganga.org/" />
        <link rel="image_src" href="{{ env('APP_URL') . 'uploads/metatag/' . $metatag->image }}" />
        <meta property="og:determiner" content="An" />
        <meta property="og:site_name" content="RSU" />
        <meta property="og:type" content="Homepage" />
        <meta property="og:url" content="https://rsu.tilganga.org/" />
        <meta property="og:title" content="Home page" />
        <meta property="og:image" content="{{ env('APP_URL') . 'uploads/metatag/' . $metatag->image }}" />
        <meta property="og:image:width" content="960" />
        <meta property="og:image:height" content="400" />
        <meta property="og:locale" content="en_GB" />
    @endif
@endsection
@section('client_content')
    <div class="wa_main_bn_wrap swiper slider">
        <div id="main-slider" class=" owl-theme slider-active swiper-wrapper ">
            @if (isset($sliders))
                @foreach ($sliders as $slider)
                    <div class="item swiper-slide">
                        <figure>
                            <img src="{{ env('APP_URL') . '/uploads/slider/' . $slider->filename }}" class=""
                                alt="" />
                            <div id="overlay"></div>
                            <figcaption>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 slider-info">
                                            <h2 class="wa-theme-color">{{ $slider->title }}</h2>
                                            <p>{{ $slider->description }}</p>
                                            <a class="common-btn" href="{{ route('about') }}">
                                                <span class="one"></span>
                                                <span class="two"></span>
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <div class="about-area two pt-100 pb-70">
        <div class="about-shape">
            <img src="assets/images/about/shape1.png" alt="Shape">
            <img src="assets/images/about/shape2.png" alt="Shape">
        </div>
        <div class="container">
            <div class="row align-items-end">
                    @if (isset($about))
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
                    @endif
            </div>
        </div>
    </div>

    <section class="services-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Notices</span>
                    <span class="sub-title">Notices</span>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <h3 class="title">News & Announcements</h3>
                    <div class="column">
                        @foreach ($news as $service)
                            <a href="/service/{{ $service->slug }}">
                                <div class="inner-notice">
                                    <div class="inner-notice-date">
                                        <p>{{ $service->created_at->format('j M') }}</p>
                                    </div>
                                    <p>{{ $service->title }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class="title">Upcoming Events</h3>
                    <div class="column">
                        @foreach ($events as $service)
                            <a href="/service/{{ $service->slug }}">
                                <div class="inner-notice">
                                    <div class="inner-notice-date">
                                        <p>{{ $service->created_at->format('j M') }}</p>
                                    </div>
                                    <p>{{ $service->title }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class="title">Examinations & Results</h3>
                    <div class="column">
                        @foreach ($results as $service)
                            <a href="/service/{{ $service->slug }}">
                                <div class="inner-notice">
                                    <div class="inner-notice-date">
                                        <p>{{ $service->created_at->format('j M') }}</p>
                                    </div>
                                    <p>{{ $service->title }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="doctors-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Officials</span>
                    <span class="sub-title">Officials</span>
                </div>
                <h2>Officials</h2>
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

    <div class="counter-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @if (isset($counters))
                    @foreach ($counters as $counter)
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter"
                                style="border: 3px solid {{ $loop->iteration === 1 ? '#319b38' : ($loop->iteration === 2 ? '#32aaee' : ($loop->iteration === 3 ? '#fc6000' : ($loop->iteration === 4 ? '#f45a75' : 'black'))) }};
                        color: {{ $loop->iteration === 1 ? '#319b38' : ($loop->iteration === 2 ? '#32aaee' : ($loop->iteration === 3 ? '#fc6000' : ($loop->iteration === 4 ? '#f45a75' : 'black'))) }};
                       
                       ">
                                <div class="counter-icon">
                                    <img src="{{ asset(env('APP_URL') . '/uploads/counter/' . $counter->image) }}"
                                        alt="{{ $counter->title }}" class="w-25 img-responsive" />
                                </div>
                                <h3>{{ $counter->title }}</h3>
                                <span class="counter-value">{{ $counter->number }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    {{-- <section class="client-area ptb-100">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Testimonials</span>
                    <span class="sub-title">Testimonials</span>
                </div>
                <h2>What Our Patients Say About Us</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="testimonial-slider" class="owl-carousel">

                        <!-- Start Testimonial Slide Item -->
                        @foreach ($testimonials as $testimonial)
                            <div class="testimonial">
                                <div class="pic">
                                    <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}" />
                                </div>
                                <h3 class="title">{{ $testimonial->name }}</h3>
                                <span class="post">{{ $testimonial->profession }}</span>
                                <p class="description">
                                    {{ $testimonial->description }}
                                </p>
                            </div>
                        @endforeach
                        <!-- End Testimonial Slide Item -->

                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <section class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Latest News</span>
                    <span class="sub-title">News & Update</span>
                </div>
                <h2>Latest News From Our Blog</h2>
            </div>

            @if (count($blogs) == 0)
                <div class="intro">
                    <h1 class="text-center">There is no any News & Update uploaded yet.</h1>
                </div>
            @elseif(count($blogs) > 0)
                <div class="row ">
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
                                        <a
                                            href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p> {!! Str::words($blog->description, 11, ' ...') !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="faqs mb-5">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">FAQs</span>
                    <span class="sub-title">FAQS</span>
                </div>
                <h2>Frequently Asked Questions</h2>
            </div>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div id="accordionExample" class="accordion shadow">
                        @foreach ($faqs as $faq)
                            <div class="card">
                                <div id="heading{{ $loop->iteration }}" class="card-header bg-white shadow-sm border-0">
                                    <h6 class="mb-0 font-weight-bold">
                                        <a data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}"
                                            aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}"
                                            class="d-block position-relative text-dark text-uppercase collapsible-link py-2">
                                            {{ $faq->question }}
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapse{{ $loop->iteration }}" aria-labelledby="heading{{ $loop->iteration }}"
                                    data-parent="#accordionExample" class="collapse">
                                    <div class="card-body p-5">
                                        <p class="font-weight-light m-0">
                                            {{ $faq->answer }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="appointment-area">

        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-lg-6 p-0">
                    <div class="appointment-img">
                        <img src="assets/images/contact.jpeg" alt="Appointment">
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="appointment-content">
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
                                        <input type="text" name="phone" id="phone_number" placeholder="Phone"
                                            required data-error="Please enter your number" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8"
                                            placeholder="Write message" required data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
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
    </div>

@endsection
@push('scripts')
    <script>
        function disableSaturdays() {
            const dateInput = document.getElementById('datetime');
            const selectedDateStr = dateInput.value;
            const selectedDate = new Date(selectedDateStr.split('.').reverse().join('-'));
            const dayOfWeek = selectedDate.getDay();

            // Disable Saturdays (dayOfWeek = 6)
            if (dayOfWeek === 6) {
                alert('Appointments are not available on Saturdays.');
                dateInput.value = ''; // Clear the input value
            }
        }

        function handleTime() {
            const timeInput = document.getElementsByName('time')[0];
            const selectedTime = timeInput.value;
            if (selectedTime < '08:00' || selectedTime > '14:00') {
                alert('Appointment time must be between 8:00 AM and 2:00 PM.');
                timeInput.value = ''; // Clear the input value
            }
        }
    </script>


    <script>
        // Initialize Owl Carousel
        $(document).ready(function() {
            $("#testimonial-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000, // 5 seconds
                autoplayHoverPause: true,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var collapsibleLinks = document.querySelectorAll('.collapsible-link');

            collapsibleLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    var collapseId = this.getAttribute('data-target');
                    var collapsibleItem = document.querySelector(collapseId);

                    if (collapsibleItem.classList.contains('show')) {
                        collapsibleItem.classList.remove('show');
                    } else {
                        // Close other open items before opening this one
                        var allCollapsibleItems = document.querySelectorAll('.collapse.show');
                        allCollapsibleItems.forEach(function(item) {
                            item.classList.remove('show');
                        });

                        collapsibleItem.classList.add('show');
                    }
                });
            });
        });
    </script>
@endpush
