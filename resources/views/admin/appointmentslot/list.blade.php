@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Appointment Slots</h3>
                    </div>
                   
                    <!-- /.card-header -->
                    @if (count($slots) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There are no appointment slots available yet.
                            </p>
                        </center>
                    @elseif(count($slots) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Day</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Step</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($slots as $slot)
                                    <tbody>
                                        <tr>
                                            <td>{{ $slot->id }}</td>
                                            <td>{{ $slot->day }}</td>
                                            <td>{{ $slot->from }}</td>
                                            <td>{{ $slot->to }}</td>
                                            <td>{{ $slot->step }}</td>
                                            <td>{{ $slot->status ? 'Active' : 'Inactive' }}</td>
                                            <td class="d-flex">
                                               <button class="btn btn-primary"><a class="text-white"
                                                    href="{{ route('admin.appointmentslot.edit', ['id' => $slot->id]) }}">Edit</a></button>
                                                <form method="post" action="{{ route('admin.appointmentslot.delete', ['id' => $slot->id]) }}">
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
