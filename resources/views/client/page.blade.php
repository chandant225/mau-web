@extends('client.layouts.master')
@section('client_content')
<section class="inner-banner blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h1>{{$post->title}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="terms-of-use">
<div class="container">
    <h2 class="pb-4">{{$post->title}}</h2>
    <p>{!!$post->description!!}</p>
</div>
</section>

@endsection