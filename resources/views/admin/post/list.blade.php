@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pages</h3>
                    </div>
                    <div>
                        <button class="btn btn-primary mx-2 mt-2"><a class="text-white"
                                href="{{ route('admin.post.add') }}">Add Page</a></button>
                    </div>
                    <!-- /.card-header -->
                    @if (count($posts) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There is not any Page avaliable yet.
                            </p>
                        </center>
                    @elseif(count($posts) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>title</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                @foreach ($posts as $post)
                                    <tbody>
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                           
                                            <td class="d-flex"><button class="btn btn-primary"><a class="text-white"
                                                        href="{{ route('admin.post.edit', ['id' => $post->id]) }}">Edit</a></button>
                                                <form method="post"
                                                    action="{{ route('admin.post.delete', ['id' => $post->id]) }}">
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
