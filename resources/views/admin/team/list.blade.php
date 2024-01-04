@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
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
                    <div class="card-header">

                        <h3 class="card-title">Teams</h3>
                    </div>
                    <div>
                        <button class="btn btn-primary mx-2 mt-2"><a class="text-white"
                                href="{{ route('admin.team.add') }}">Add team</a></button>
                    </div>
                    <!-- /.card-header -->
                    @if (count($teams) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There is not any team member avaliable yet.
                            </p>
                        </center>
                    @elseif(count($teams) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Linkdin</th>
                                        <th>Description</th>
                                        <th>status</th>
                                        <th>image</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                @foreach ($teams as $team)
                                    <tbody>
                                        <tr>
                                            <td>{{ $team->id }}</td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->designation }}</td>
                                            <td>{{ $team->linkdin }}</td>
                                            <td><button data-toggle="modal"
                                                    data-target="#exampleModal{{ $loop->iteration }}"
                                                    class="btn btn-warning ml-2"><a class="text-white" href="#">View
                                                        description</a></button></td>
                                            <td>{{ $team->status }}</td>
                                            <td><img src="{{ asset(env('APP_URL') . '/uploads/team/' . $team->image) }}"
                                                    alt="{{ $team->name }}" class="w-25 img-responsive" />
                                            </td>
                                            <td class="d-flex">

                                                <button class="btn btn-primary"><a class="text-white"
                                                        href="{{ route('admin.team.edit', ['id' => $team->id]) }}">Edit</a></button>
                                                <form method="post"
                                                    action="{{ route('admin.team.delete', ['id' => $team->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $team->description }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
