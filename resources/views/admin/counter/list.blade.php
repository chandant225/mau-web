@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Counters</h3>
                    </div>
                    <div>
                        <button class="btn btn-primary mx-2 mt-2"><a class="text-white"
                                href="{{ route('admin.counter.add') }}">Add Counters</a></button>
                    </div>
                    <!-- /.card-header -->
                    @if (count($counters) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There is not any counter avaliable yet.
                            </p>
                        </center>
                    @elseif(count($counters) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>title</th>
                                        <th>number</th>
                                        <th>number</th>
                                        <th>image</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                @foreach ($counters as $counter)
                                    <tbody>
                                        <tr>
                                            <td>{{ $counter->id }}</td>
                                            <td>{{ $counter->title }}</td>
                                            <td>{{ $counter->number }}</td>
                                            <td><img src="{{ asset(env('APP_URL') . '/uploads/counter/' . $counter->image) }}"
                                                    alt="{{ $counter->title }}" class="w-25 img-responsive" />
                                            </td>
                                            <td class="d-flex"><button class="btn btn-primary"><a class="text-white"
                                                        href="{{ route('admin.counter.edit', ['id' => $counter->id]) }}">Edit</a></button>
                                                <form method="post"
                                                    action="{{ route('admin.counter.delete', ['id' => $counter->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                                </form>
                                                <button class="btn btn-warning ml-2"><a class="text-white"
                                                        href="#">View
                                                        Content</a></button>
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
