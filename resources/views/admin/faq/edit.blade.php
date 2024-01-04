@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <center>
        <h3 class="py-2">edit Faq</h3>
    </center>
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
            <form method="post" action="{{route('admin.faq.update',['id'=>$faq->id])}}" enctype="multipart/form-data">
                @csrf
                <div id="wrapper">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="question">question</label>
                            <input type="text" class="form-control" id="question" placeholder="Enter question"
                                name="questions" value="{{ $faq->question }}">
                            <span class="text-danger">
                                @error('question')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea class="form-control" id="answer" placeholder="Enter the Description" name="answers">{{$faq->answer}}</textarea>
                            <span class="text-danger">
                                @error('answer')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
