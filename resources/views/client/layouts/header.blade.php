
<div class="header-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            @if (isset($profile))
            <div class="col-sm-2 col-lg-2">
                <div class="left">
                    <a href="{{route('home')}}">
                        <img src=" {{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}" class="left-logo1"
                            style="background: #0098a8; height:60px;" alt="Logo" />
                        <img src=" {{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}" class="left-logo2" style="height: 60px"
                            alt="Logo" />
                    </a>
                </div>
              
            </div>
            <div class="col-sm-10 col-lg-10">
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
    <div class="mobile-nav">
        <a href="{{route('home')}}" class="logo">
            <img src="{{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}" style="background: #0098a8;
        height: 60px;"
                class="mobile-logo1" alt="Logo" />
            <img src="{{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}" class="mobile-logo2" style="
          height: 60px;"
                alt="Logo" />
        </a>
    </div>
    @endif   
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link dropdown-toggle active">Home </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('services')}}" class="nav-link dropdown-toggle">Notices and events </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('doctors')}}" class="nav-link dropdown-toggle">Officials </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('blogs')}}" class="nav-link dropdown-toggle">News & Update </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('gallery')}}" class="nav-link dropdown-toggle">Gallery </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link">Contact</a>
                        </li>
                    </ul>
                    <div class="side-nav">

                        <div class="social">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/tilgangainstituteofophthalmology" target="_blank">
                                        <i class="bx bxl-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/tilgangao?lang=en" target="_blank">
                                        <i class="bx bxl-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://rsu.tilganga.org/www.linkdin.com" target="_blank">
                                        <i class="bx bxl-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>


