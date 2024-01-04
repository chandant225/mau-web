@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <center>
            <h3 class="py-2">Add Gallery</h3>
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
                <form method="post" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter title"
                                name="title" value="{{ old('title') }}">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="number" class="form-control" id="position" placeholder="Enter position in number"
                                name="position" value="{{ old('position') }}">
                            <span class="text-danger">
                                @error('position')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Select the cover image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input class="form-control" name="cover_image" type="file" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Select the gallery images</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input class="form-control" name="images[]" type="file" multiple id="imageInput" />
                                </div>
                            </div>
                        </div>
                        <div id="preview"></div>
                    </div>
                    <!-- /.card-body -->

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
