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
                                        <th>twitterLink</th>
                                        <th>linkdinLink</th>
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
                                            <td>{{ $profile->twitterLink }}</td>
                                            <td>{{ $profile->linkdinlink }}</td>
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
