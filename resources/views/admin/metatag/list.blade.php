@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">metatags</h3>
                    </div>
                    <!-- /.card-header -->
                    @if (count($metatags) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There is not any metatags avaliable yet.
                            </p>
                        </center>
                    @elseif(count($metatags) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>'
                                        <th>Page</th>
                                        <th>title</th>
                                        <th>image</th>
                                         <th>action</th>
                                    </tr>
                                </thead>
                                @foreach ($metatags as $metatag)
                                    <tbody>
                                        <tr>
                                            <td>{{ $metatag->id }}</td>
                                            <td>{{ $metatag->page }}</td>
                                            <td>{{ $metatag->title }}</td>
                                            <td><img src="{{ env('APP_URL') . '/uploads/metatag/' . $metatag->image }}"
                                                    alt="{{ $metatag->title }}" class="w-25 img-responsive" />
                                            </td>
                                            <td class="d-flex"><button class="btn btn-primary"><a class="text-white"
                                                        href="{{ route('admin.metatag.edit', ['id' => $metatag->id]) }}">Edit</a></button>
                                                <form method="post"
                                                    action="{{ route('admin.metatag.delete', ['id' => $metatag->id]) }}">
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
