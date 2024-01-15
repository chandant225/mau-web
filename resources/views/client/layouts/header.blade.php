<div class="header-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            @if (isset($profile))
                <div class="col-sm-2 col-lg-2">
                    <div class="left">
                        <a href="{{ route('home') }}">
                            <img src=" {{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}"
                                class="left-logo1" style="background: #0098a8; height:6rem;" alt="Logo" />
                            {{-- <img src=" {{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}"
                                class="left-logo2" style="height: 60px" alt="Logo" /> --}}
                        </a>
                    </div>

                </div>
                <div class="col-lg-6 logo-title">
                    <h2>MADHESH AGRICULTURAL UNIVERSITY</h2>
                    <h5>Rajbiraj-3, Saptari, Madhesh Province, Nepal</h5>
                </div>
                <div class="col-sm-10 col-lg-4">
                    <div class="right">
                        <ul>
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <h4>Phone</h4>
                                <a href="tel: {{ $profile->phone }}"> {{ $profile->phone }}</a>
                            </li>
                            <li>
                                <i class="flaticon-placeholder"></i>
                                <h4>Location</h4>
                                <a href="#">{{ $profile->address }}</a>
                            </li>

                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="navbar-area sticky-top">
    @if (isset($profile))
        <div class="mobile-nav d-flex">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}"
                    style="height: 75px;" class="mobile-logo1" alt="Logo" />
              
            </a>
        </div>
      
    @endif
    <div class=" mob-logo-title">
        <h2>MADHESH AGRICULTURAL<br> UNIVERSITY</h2>
        <h5>Rajbiraj-3, Saptari,<br> Madhesh Province, Nepal</h5>
    </div>
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link dropdown-toggle active">Home </a>
                        </li>

                        <li class="nav-item">
                            <div class="dropdown dropdown-toggle">
                                <a href="{{route('about')}}" class="nav-link">
                                    About Us
                                </a>
                                <div class="dropdown-content">
                                    <a href="/department/vision">Vision</a>
                                    <a href="/department/mission">Mission</a>
                                    <a href="/department/goal">Goal</a>
                                    <a href="/department/objective">Objective</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <div class="dropdown dropdown-toggle">
                                <a href="#" class="nav-link">
                                    Administration
                                </a>
                                <div class="dropdown-content">
                                    <a href="/department/office_of_the_vice_chancellor">Office of the Vice-Chancellor</a>
                                    <a href="/department/office_of_the_register">Office of the Registrar</a>
                                    <a href="/department/office_of_the_finance">Office of the Finance</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <div class="dropdown dropdown-toggle">
                                <a href="#" class="nav-link">
                                    Program
                                </a>
                                <div class="dropdown-content">
                                    <a href="/department/academic">Academic</a>
                                    <a href="/department/research">Research</a>
                                    <a href="/department/development">Development</a>
                                    <a href="/department/laboratory">Laboratory</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <div class="dropdown dropdown-toggle">
                                <a href="#" class="nav-link">
                                    Our Faculties
                                </a>
                                <div class="dropdown-content">
                                    <a href="/department/classroom">Classroom </a>
                                    <a href="/department/lab">Lab</a>
                                    <a href="/department/library">Library</a>
                                    <a href="/department/hostel">Hostel</a>
                                    <a href="/department/sports_background">Sports & Background</a>
                                    <a href="/department/playground">Playground</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <div class="dropdown dropdown-toggle">
                                <a href="#" class="nav-link">
                                    Publication
                                </a>
                                <div class="dropdown-content">
                                    <a href="/department/journal">Journal </a>
                                    <a href="/department/books">Books</a>
                                    <a href="/department/reports">Report</a>
                                    <a href="/department/documentary">Documentary</a>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Act/Plan & Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Announcement </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('blogs') }}" class="nav-link dropdown-toggle">Event & Activity </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gallery') }}" class="nav-link dropdown-toggle">Gallery </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
                        </li>
                    </ul>
                   
                </div>
            </nav>
        </div>
    </div>
</div>
