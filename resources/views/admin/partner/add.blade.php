@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <center>
            <h3 class="py-2">Add Partner</h3>
        </center>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputFile">upload partner images</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="images[]" type="file" multiple id="imageInput" />
                            </div>
                        </div>
                        <div id="preview"></div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script>
        // Get the input element
        var imageInput = document.getElementById("imageInput");
        // Get the preview container
        var preview = document.getElementById("preview");

        // Listen for a change in the input element
        imageInput.addEventListener("change", function() {
            // Get the selected files
            var files = imageInput.files;
            // Loop through the files
            for (var i = 0; i < files.length; i++) {
                // Create a new FileReader object
                var reader = new FileReader();
                // Listen for the load event on the FileReader
                reader.addEventListener("load", function() {
                    // Create an <img> element with the src set to the file's data URL
                    var img = document.createElement("img");
                    img.src = this.result;
                    img.style.width = "10rem";
                    img.style.height = "10rem";
                    // Append the <img> element to the preview container
                    preview.appendChild(img);
                });
                // Read the file
                reader.readAsDataURL(files[i]);
            }
        });
    </script>
@endpush
