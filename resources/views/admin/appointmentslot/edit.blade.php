@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <center>
            <h3 class="py-2">Edit Appointment Slot</h3>
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
                <form method="post" action="{{ route('admin.appointmentslot.update', ['id' => $slot->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="day">Day</label>
                            <input type="text" class="form-control" id="day" placeholder="Enter day"
                                name="day" value="{{ $slot->day }}">
                            <span class="text-danger">
                                @error('day')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="from">From</label>
                            <input type="time" class="form-control" id="from" placeholder="Enter starting time" name="from" value="{{ $slot->from }}">
                            <span class="text-danger">
                                @error('from')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="to">To</label>
                            <input type="time" class="form-control" id="to" placeholder="Enter ending time" name="to" value="{{ $slot->to }}">
                            <span class="text-danger">
                                @error('to')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="step">Step (minutes)</label>
                            <input type="text" class="form-control" id="step" placeholder="Enter time interval" name="step" value="{{ $slot->step }}">
                            <span class="text-danger">
                                @error('step')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="1" {{ $slot->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$slot->status ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <span class="text-danger">
                                @error('status')
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
