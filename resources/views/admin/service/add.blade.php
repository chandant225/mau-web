@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <center>
            <h3 class="py-2">Add Service</h3>
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
                <form method="post" action="{{ route('admin.service.store') }}" enctype="multipart/form-data">
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
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" placeholder="Enter the Description" name="description"></textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Choose category</label>
                            <div class="input-group">
                                <select id="selectCategory" name="category" class="form-control">
                                    <option value="news">News & Announcements</option>
                                    <option value="events">Upcoming Events</option>
                                    <option value="results">Examinations & Results</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                       
                        <label for="pdf_file">PDF File</label>
                        <div class="input-group">
                            <div>
                                <input type="file" name="pdf_file" id="pdf_file_input" onchange="updateFileNameLabel()" />
                            </div>
                        </div>
                        <span class="text-danger">
                            @error('pdf_file')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">meta_title</label>
                            <input type="text" class="form-control" id="meta_title" placeholder="Enter meta_title"
                                name="meta_title" value="{{ old('meta_title') }}">
                            <span class="text-danger">
                                @error('meta_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="meta_description">meta_description</label>
                            <textarea class="form-control" id="meta_description" placeholder="Enter the meta_description" name="meta_description"></textarea>
                            <span class="text-danger">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">meta_keywords</label>
                            <textarea class="form-control" id="meta_keywords" placeholder="Enter the meta_keywords" name="meta_keywords"></textarea>
                            <span class="text-danger">
                                @error('meta_keywords')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
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
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('admin.service.editor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script>
     <script>
        function updateFileNameLabel() {
            var input = document.getElementById('pdf_file_input');
            var label = document.querySelector('.custom-file-label');
            var fileName = input.files[0].name;
            label.innerHTML = fileName;

            // Display the file name in a separate span
            var fileNameSpan = document.getElementById('pdf_file_name');
            fileNameSpan.innerHTML = 'Selected PDF File: ' + fileName;
        }
    </script>
@endpush
