@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Service</h3>
                    </div>
                    <!-- /.card-header -->
                    @if (count($services) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There is not any Service avaliable yet.
                            </p>
                        </center>
                    @elseif(count($services) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>title</th>
                                        <th>meta_title</th>
                                        <th>meta_description</th>
                                        <th>meta_keywords</th>
                                        <th>image</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                @foreach ($services as $service)
                                    <tbody>
                                        <tr>
                                            <td>{{ $service->id }}</td>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->meta_title }}</td>
                                            <td>{{ $service->meta_description }}</td>
                                            <td>{{ $service->meta_keywords }}</td>
                                            <td><img src="{{ env('APP_URL') . '/uploads/service/' . $service->filename }}"
                                                    alt="{{ $service->title }}" class="w-25 img-responsive" />
                                            </td>
                                            <td class="d-flex"><button class="btn btn-primary"><a class="text-white"
                                                        href="{{ route('admin.service.edit', ['id' => $service->id]) }}">Edit</a></button>
                                                <form method="post"
                                                    action="{{ route('admin.service.delete', ['id' => $service->id]) }}">
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
