@extends('client.layouts.master')

@section('client_content')
      <!-- Start Banner -->
    <section class="inner-banner about-us-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <h1>Gallery</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner -->
    <section class="container mx-auto mt-5 mb-5 gallery">
        <div class="row">
            @foreach ($images as $image)
                <div class="col-sm-6 col-lg-4 mt-2 mb-2 gallery-image">
                    <img src="{{ env('APP_URL') . '/uploads/gallery/album/' . $image->filename }}"
                        alt="{{ $image->filename }}" class="hover-shadow cursor" 
                        onclick="openModal();currentSlide({{ $loop->iteration }})">
                </div>
            @endforeach
        </div>
        <div id="myGalleryModal" class="galleryModal">
            <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="gallery-content">
                @foreach ($images as $image)
                    <div class="mySlides">
                        <img src="{{ env('APP_URL') . '/uploads/gallery/album/' . $image->filename }}"
                            alt="{{ $image->filename }}" class="gallery-img">
                    </div>
                @endforeach
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function openModal() {
            document.getElementById("myGalleryModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myGalleryModal").style.display = "none";
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
@endpush