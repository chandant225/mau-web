@extends('client_content')
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
                        <button class="btn btn-primary"><a class="text-white"
                                href="{{ route('admin.gallery.image.add_more.get',['slug' => $slug]) }}">Add more Images</a></button>
                    </div>
                    <!-- /.card-header -->
                    @if (count($images) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There is not any images avaliable yet.
                            </p>
                        </center>
                    @elseif(count($images) >= 1)
                        <div class="card-body p-0">
                            <div class="row">
                                @foreach ($images as $image)
                                    <div class="col-4">
                                        <img src="{{ env('APP_URL') . '/uploads/gallery/album/' . $image->filename }}"
                                            alt="{{ $image->filename }}" class="w-100 h-75 img-responsive" />
                                        <form method="post"
                                            action="{{ route('admin.gallery.image.delete', ['id' => $image->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger mt-2 ml-2">Delete</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
