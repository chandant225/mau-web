<!-- Start Footer -->
{{-- <footer class="footer">
    @if (isset($profile))
        <div class="container">
            <div class="row row1">
                <div class="col-sm-3 logo-section">
                    <div class="footer-logo hidden-xs">
                        <img src=" {{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}" alt="">
                    </div>
                    <div class="contact clearfix">
                        <ul class="hidden-xs">
                            <li><a href="mailto: rsuappointment@tilganga.org" class="mail"> {{ $profile->email }}</a>
                            </li>
                            <li><a href="tel:{{ $profile->email }}" class="ph-number">{{ $profile->phone }}</a></li>
                        </ul>
                    </div>
                    <div class="connect-with">
                        <p>Connect with us -</p>
                        <ul class="follow-us clearfix">
                            <li><a href="{{ $profile->facebookLink }}"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="{{ $profile->twitterLink }}"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="{{ $profile->linkdinlink }}"><i class="fa fa-linkedin"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 services">
                    <h3>QUICK LINKS</h3>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">About</a>
                        </li>
                        <li>
                            <a href="{{ route('services') }}">Services</a>
                        </li>
                        <li>
                            <a href="{{ route('doctors') }}">Team</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 opening-hours">
                    <h3>OPENING HOURS</h3>
                    <div class="top">
                        <p>Sun – Fri <span>8am – 5pm</span></p>
                        <p>Saturday <span>Closed</span></p>
                        
                    </div>
                </div>
                <div class="col-sm-3 footer-blog">
                    <div class="google-map">
                        <div id="footer-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.378025271017!2d85.34787877539128!3d27.705612276183526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1981f114d961%3A0xd4b4f33375050e34!2sTilganga%20Institute%20of%20Ophthalmology!5e0!3m2!1sen!2snp!4v1684214299095!5m2!1sen!2snp"
                                width="370" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>


                </div>
            </div>
    @endif
  
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 left">
                    <p>Copyright &copy; {{ date('Y') }} developed by <a href="https://outofboxdesign.com/" style="color: #fff"> outofboxdesign.</a> All Rights Reserved</p>
                </div>
                <div class="col-sm-6 right">
                    <ul class="terms clearfix">
                        @if (isset($posts))
                            @foreach ($posts as $post)
                                <li><a href="{{ route('page', ['slug'=> $post->slug]) }}">{{$post->title}}</a></li>
                            @endforeach
                        @endif
                    
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</footer> --}}

<footer class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            @if (isset($profile))
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-item">
                        <div class="footer-contact">
                            <a href="{{ route('home') }}">

                                <img src="{{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}"
                                    class="left-logo2" style="height: 100px" alt="Logo" />
                            </a>
                            <ul>
                                <li>
                                    <span> <i class="flaticon-phone-call"></i></span>
                                    <a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a>
                                </li>
                                <li>
                                    <span><i class="bx bx-mail-send"></i></span>
                                    <a href="mailto: {{ $profile->email }}"><span>
                                            {{ $profile->email }}</span></a>
                                </li>
                                <li>
                                    <span><i class="flaticon-placeholder"></i></span>
                                    <a
                                        href="https://www.google.com/maps/place/Tilganga+Institute+of+Ophthalmology/@27.705617,85.3478788,17z/data=!3m1!4b1!4m6!3m5!1s0x39eb1981f114d961:0xd4b4f33375050e34!8m2!3d27.7056123!4d85.3504537!16s%2Fm%2F0yp28xq?entry=ttu">{{$profile->address}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-6 col-lg-2">
                <div class="footer-item">
                    <div class="footer-links">
                        <h3>About</h3>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">About</a>
                            </li>
                            <li>
                                <a href="{{ route('doctors') }}">Doctors</a>
                            </li>
                            <li>
                                <a href="{{ route('services') }}">Services</a>
                            </li>
                            <li>
                                <a href="{{ route('blogs') }}">News & Update</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-hours">
                        <h3>Opening Hours</h3>
                        <ul>
                            <li>
                                Sun - Fri
                                <span>08:00 AM - 05:00 PM</span>
                            </li>
                            <li>
                                Saturday
                                <span>Closed</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-links">
                        <div class="map-item">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3532.3780342126056!2d85.350454!3d27.705612!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1981f114d961%3A0xd4b4f33375050e34!2sTilganga%20Institute%20of%20Ophthalmology!5e0!3m2!1sen!2snp!4v1690535290188!5m2!1sen!2snp"
                                width="380" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <p>
                    Copyright @
                    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    RSU 
                    {{-- Designed By
                    <a href="https://outofboxdesign.com/" target="_blank">outofboxdesign</a> --}}
                </p>
            </div>
            <div class="col-lg-6">
                <ul>
                    <li>
                        <a href="{{ route('terms') }}">Terms & Conditions</a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}">Privacy Policy</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
