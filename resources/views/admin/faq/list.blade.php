@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <a href="{{route('admin.faq.add')}}" class="btn btn-primary m-3">Add Faq</a>
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
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Faqs</h3>
                    </div>
                    <!-- /.card-header -->
                    @if (count($faqs) === 0)
                        <center>
                            <p class="text-2xl text-red-600 font-bold">
                                There are not any faqs avaliable yet.
                            </p>
                        </center>
                    @elseif(count($faqs) >= 0)
                          @foreach($faqs as $faq)
                        <div class="card-body p-2">
                           <p><span class="mr-2">{{$loop->iteration}}</span>{{$faq->question}}</p>
                           <p>{{$faq->answer}}</p>
                           <div class="d-flex justify-content-end">
                            <button class="d-inline  btn btn-success"><a class="text-white" href="{{route('admin.faq.edit',['id'=>$faq->id])}}">edit</a></button>
                          
                            <form class="d-inline" method="post"
                            action="{{ route('admin.faq.delete', ['id' => $faq->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger ml-2">Delete</button>
                        </form>
                           </div>
                        </div>
                          @endforeach
                    @endif
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection