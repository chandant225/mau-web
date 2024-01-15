@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                    </div>
                    <div>
                       @if(count($profiles) === 0)
                       <button class="btn btn-primary mx-2 mt-2"><a class="text-white"
                        href="{{ route('admin.profile.add') }}">Add profile</a></button>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    @if (count($profiles) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There is not any profile avaliable yet.
                            </p>
                        </center>
                    @elseif(count($profiles) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>email</th>
                                        <th>address</th>
                                        <th>phone</th>
                                        <th>facebookLink</th>
                                        <th>marquee</th>
                                        <th>logo</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                @foreach ($profiles as $profile)
                                    <tbody>
                                        <tr>
                                            <td>{{ $profile->id }}</td>
                                            <td>{{ $profile->email }}</td>
                                            <td>{{ $profile->address }}</td>
                                            <td>{{ $profile->phone }}</td>
                                            <td>{{ $profile->facebookLink }}</td>
                                            <td>  <button data-toggle="modal"
                                                data-target="#staticBackdrop{{ $loop->iteration }}" type="button"
                                                class="btn btn-warning ml-2"><a class="text-white"
                                                    href="#">View
                                                    Content</a></button></td>
                                            <td><img src="{{ asset(env('APP_URL') . '/uploads/profile/' . $profile->image) }}"
                                                    alt="" class="w-25 img-responsive" />
                                            </td>
                                            <td class="d-flex"><button class="btn btn-primary"><a class="text-white"
                                                        href="{{ route('admin.profile.edit', ['id' => $profile->id]) }}">Edit</a></button>
                                                <form method="post"
                                                    action="{{ route('admin.profile.delete', ['id' => $profile->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="staticBackdrop{{ $loop->iteration }}" data-backdrop="static"
                                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Marquee</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <section> {!! $profile->marquee !!}</section>
    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    @endif
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
