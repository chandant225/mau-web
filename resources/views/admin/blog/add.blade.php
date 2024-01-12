@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <center>
            <h3 class="py-2">Add Blog</h3>
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
                <form method="post" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
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
                            <label for="department">Select Department:</label>
                            <select id="department" name="department">
                                <option value="vision">Vision</option>
                                <option value="mission">Mission</option>
                                <option value="goal">Goal</option>
                                <option value="objective">Objective</option>
                                <option value="office_of_the_vice_chancellor">Office of the Vice-Chancellor</option>
                                <option value="office_of_the_register">Office of the Register</option>
                                <option value="office_of_the_finance">Office of the Finance</option>
                                <option value="academic">Academic</option>
                                <option value="research">Research</option>
                                <option value="development">Development</option>
                                <option value="laboratory">Laboratory</option>
                                <option value="classroom">Classroom</option>
                                <option value="lab">Lab</option>
                                <option value="library">Library</option>
                                <option value="hostel">Hostel</option>
                                <option value="sports_background">Sports & Background</option>
                                <option value="playground">Playground</option>
                                <option value="journal">Journal</option>
                                <option value="books">Books</option>
                                <option value="reports">Reports</option>
                                <option value="documentary">Documentary</option>
                            </select>
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
            filebrowserUploadUrl: "{{ route('admin.blog.editor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script>
@endpush
