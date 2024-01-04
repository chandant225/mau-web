@extends('client.layouts.master')
@section('client_content')
    {{-- @foreach ($teams as $team)
        @if (isset($team))
            <li class="col-md-4 equal-hight">
                <div class="inner">
                    <img src="{{ env('APP_URL') . '/uploads/team/' . $team->image }}" class="img-responsive"
                        alt="{{ $team->name }}">
                    <h3><a href="{{ route('doctor.details', ['slug' => $team->slug]) }}" style="color: #008ad1">
                            {{ $team->name }}
                        </a></h3>
                    <h4>{{ $team->designation }}</h4>
                    <p>{!! Str::words($team->description, 20, ' ...') !!}</p>
                    <a href="{{ route('doctor.details', ['slug' => $team->slug]) }}" class="btn">VIEW
                        PROFILE</a>
                </div>
            </li>
        @else
            <h3>no any team member.</h3>
        @endif
    @endforeach --}}


    <div class="page-title-area title-bg-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Teams</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <span>Teams</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="doctors-area ptb-100">
        <div class="container">
            <div class="section-title">
                <div class="top">
                    <span class="top-title">Teams</span>
                    <span class="sub-title">Teams</span>
                </div>
                <h2>Refractive Surgery unit</h2>
            </div>
            <div class="row">
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
