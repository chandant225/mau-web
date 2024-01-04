@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <center>
            <h3 class="py-2">Edit team</h3>
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
                <form method="post" action="{{ route('admin.team.update', ['id' => $team->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                name="name" value="{{ $team->name }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" placeholder="Enter designation"
                                name="designation" value="{{ $team->designation }}">
                            <span class="text-danger">
                                @error('designation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" placeholder="Enter the Description" name="description">
                                {{ $team->description }}
                            </textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="linkdin">Linkdin</label>
                            <input type="text" class="form-control" id="linkdin" placeholder="https://www.linkedin.com/"
                                name="linkdin" value="{{ $team->linkdin }}">
                            <span class="text-danger">
                                @error('linkdin')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="number" class="form-control" id="position" name="position" placeholder="Enter the position" value="{{ $team->position }}">
                            <span class="text-danger">
                                @error('position')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" id="image-input" />
                                </div>
                            </div>
                            <div class="p-3">
                                <img src="{{ asset(env('APP_URL') . 'uploads/team/' . $team->image) }}"
                                    alt="{{ $team->name }}" class="w-25 img-responsive" />
                            </div>
                            <div class="p-3">
                                <img src="" alt="" class="w-25" id="image-preview">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="active"
                                    name="status" {{$team->status === 'active' ? "checked" : ""}}>
                                <label class="form-check-label" for="inlineCheckbox1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox2" value="inactive"
                                    name="status" {{$team->status === 'inactive' ? "checked" : "" }}>
                                <label class="form-check-label" for="inlineCheckbox2">Inactive</label>
                            </div>
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
        const input = document.querySelector('#image-input');
        const preview = document.querySelector('#image-preview');

        input.addEventListener('change', () => {
            const file = input.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', () => {
                preview.src = reader.result;
            });

            reader.readAsDataURL(file);
        });
    </script>
@endpush
