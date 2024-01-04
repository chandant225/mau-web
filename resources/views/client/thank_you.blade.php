@extends('client.layouts.master')


@section('client_content')
    <!-- Start Banner -->

    <section class="inner-banner contact thank-you">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <h1>Thank You</h1>
                        <p>Thank you for submitting your form! We appreciate your interest and will review your submission
                            as soon as possible. If you have any further questions or concerns, please don't hesitate to
                            reach out to us. We'll do our best to provide you with the information you need. Thanks again
                            for taking the time to submit your form.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- End Banner -->
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const section = document.querySelector(".thank-you");
            section.classList.add("animate");
        });
    </script>
@endpush
