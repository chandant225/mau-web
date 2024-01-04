@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <center>
            <h3 class="py-2">Edit Profile</h3>
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
                <form method="post" action="{{ route('admin.profile.update', ['id' => $profile->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email"
                                name="email" value="{{ $profile->email }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter address"
                                name="address" value="{{ $profile->address }}">
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="phone" >Phone</label>
                            <input class="form-control" id="phone"  placeholder="Enter the phone"  name="phone" type="number
                            " value="{{$profile->phone}}">
                            <span class="text-danger">
                                @error('phone' )
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="facebookLink">Facebook Link</label>
                            <input type="text" class="form-control" id="facebookLink" placeholder="Enter facebookLink"
                                name="facebookLink" value="{{ $profile->facebookLink}}">
                            <span class="text-danger">
                                @error('facebookLink')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="twitterLink">Twitter Link</label>
                            <input type="text" class="form-control" id="twitterLink" placeholder="Enter twitterLink"
                                name="twitterLink" value="{{$profile->twitterLink }}">
                            <span class="text-danger">
                                @error('twitterLink')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="linkdinLink">Linkdin Link</label>
                            <input type="text" class="form-control" id="linkdinLink" placeholder="Enter linkdinLink"
                                name="linkdinlink" value="{{ $profile->linkdinlink }}">
                            <span class="text-danger">
                                @error('linkdinlink')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Add Logo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" />
                                </div>
                            </div>
                            <img src="{{ env('APP_URL') . '/uploads/profile/' . $profile->filename }}" alt="{{ $profile->title }}"
                                class="w-100 img-responsive" />
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

