@extends('client.layouts.master')

@section('client_content')
    <!-- Start Doctors Profile Section -->
    {{-- <section class="doctor-profile padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-5 left-block">
                    <img src="{{ env('APP_URL') . '/uploads/team/' . $team->image }}" alt="{{ $team->name }}" />
                    <div class="doctor-info">
                        <h3>{{ $team->name }}</h3>
                        <h4>{{ $team->designation }}</h4>
                        <ul class="follow-us clearfix">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 right-block">
                    <h2>{{ $team->name }}</h2>
                    <h3 class="subTitle">{{ $team->designation }}</h3>
                    <p> {!! $team->description !!}</p>
                </div>

            </div>
        </div>
    </section> --}}
    <!-- End Doctors Profile Section -->

    <div class="page-title-area title-bg-two">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Official Details</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <span>Official Details</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="doctor-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="doctor-info">
                        <div class="top">
                            <img src="{{ env('APP_URL') . '/uploads/team/' . $team->image }}" alt="{{ $team->name }}" />
                        </div>
                        <div class="bottom">
                            <h3>{{ $team->name }}</h3>
                            <span>{{ $team->designation }}</span>
                            <ul class="common-social">
                                <li>
                                    <a href="{{ $team->linkdin }}" target="_blank">
                                        <i class='bx bxl-linkedin'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="details-content">
                        <h2>Biography</h2>
                        <p>{!! $team->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
