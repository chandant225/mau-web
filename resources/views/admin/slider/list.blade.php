@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sliders</h3>
                    </div>
                    <!-- /.card-header -->
                    @if (count($sliders) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There are not any sliders avaliable yet.
                            </p>
                        </center>
                    @elseif(count($sliders) >= 1)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>title</th>
                                        <th>image</th>
                                        <th>description</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                @foreach ($sliders as $slider)
                                    <tbody>
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td><span class="tag tag-success">{!! $slider->description !!}</span></td>
                                            <td><img src="{{ env('APP_URL') . '/uploads/slider/' . $slider->filename }}"
                                                    alt="{{ $slider->title }}" class="w-25 img-responsive" />
                                            </td>
                                           
                                            <td><button class="btn btn-primary"><a class="text-white"
                                                        href="{{ route('admin.slider.edit', ['id' => $slider->id]) }}">Edit</a></button>
                                                <form method="post"
                                                    action="{{ route('admin.slider.delete', ['id' => $slider->id]) }}">
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
