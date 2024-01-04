@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Albums</h3>
                    </div>
                    <!-- /.card-header -->
                    @if (count($albums) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There are not any albums avaliable yet.
                            </p>
                        </center>
                    @elseif(count($albums) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>title</th>
                                        <th>position</th>
                                        <th>cover image</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                @foreach ($albums as $album)
                                    <tbody>
                                        <tr>
                                            <td>{{ $album->id }}</td>
                                            <td>{{ $album->title }}</td>
                                            <td>{{ $album->position }}</td>
                                            <td><img src="{{ asset(env('APP_URL') . '/uploads/gallery/cover/' . $album->cover_image) }}"
                                                    alt="{{ $album->title }}" class="w-25 h-50 img-responsive" />
                                            </td>
                                            <td class="d-flex">
                                                <button class="btn btn-warning mr-2"><a class="text-white" href="{{route('admin.gallery.image',['album_slug' => $album->slug])}}">View Images</a></button>
                                                <button class="btn btn-primary"><a class="text-white"
                                                        href="{{ route('admin.gallery.edit', ['id' => $album->id]) }}">Edit</a></button>
                                                <form method="post"
                                                    action="{{ route('admin.gallery.delete', ['id' => $album->id]) }}">
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
