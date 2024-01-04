@extends('admin.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contact Form Details</h3>
                    </div>
                    <!-- /.card-header -->
                    @if (count($formsData) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There is not any submitted contact form avaliable yet.
                            </p>
                        </center>
                    @elseif(count($formsData) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Area</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($formsData as $form)
                                    <tbody>
                                        <tr>
                                            <td>{{ $form->id }}</td>
                                            <td>{{ $form->fullname }}</td>
                                            <td>{{ $form->email }}</td>
                                            <td>{{ $form->telephone }}</td>
                                            <td>{{ $form->location }}</td>
                                            <td>{{ $form->area }}</td>
                                            <td>{{ $form->message }}</td>
                                            <td class="d_flex">
                                                <form method="post" action="{{route('admin.contact.delete',['id'=>$form->id])}}">
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
