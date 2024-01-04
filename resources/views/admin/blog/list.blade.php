@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Blogs</h3>
                    </div>
                    <div>
                        <button class="btn btn-primary mx-2 mt-2"><a class="text-white"
                                href="{{ route('admin.blog.add') }}">Add blog</a></button>
                    </div>
                    <!-- /.card-header -->
                    @if (count($blogs) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There is not any blog avaliable yet.
                            </p>
                        </center>
                    @elseif(count($blogs) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>title</th>
                                        <th>image</th>
                                        <th>meta_title</th>
                                        <th>meta_description</th>
                                        <th>meta_keywords</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                @foreach ($blogs as $blog)
                                    <tbody>
                                        <tr>
                                            <td>{{ $blog->id }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->meta_title }}</td>
                                            <td>{{ $blog->meta_description }}</td>
                                            <td>{{ $blog->meta_keywords }}</td>
                                            <td><img src="{{ asset(env('APP_URL') . '/uploads/blog/' . $blog->filename) }}"
                                                    alt="{{ $blog->title }}" class="w-25 img-responsive" />
                                            </td>
                                            <td class="d-flex"><button class="btn btn-primary"><a class="text-white"
                                                        href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}">Edit</a></button>
                                                <form method="post"
                                                    action="{{ route('admin.blog.delete', ['id' => $blog->id]) }}">
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
