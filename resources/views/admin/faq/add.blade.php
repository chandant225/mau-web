@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <center>
        <h3 class="py-2">Add Faq</h3>
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
            <form method="post" action="{{route('admin.faq.add')}}" enctype="multipart/form-data">
                @csrf
                <div id="wrapper">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="question">question</label>
                            <input type="text" class="form-control" id="question" placeholder="Enter question"
                                name="questions[]" value="{{ old('question') }}">
                            <span class="text-danger">
                                @error('question')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea class="form-control" id="answer" placeholder="Enter the Description" name="answers[]"></textarea>
                            <span class="text-danger">
                                @error('answer')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                
                </div>
                <!-- /.card-body -->
                <button style="float: right" class="btn btn-warning text-white add_item_btn">
                    Add more Faq
                </button>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
         $(".add_item_btn").click(function(e) {
            e.preventDefault();
            $('#wrapper').prepend(`
            <div class="card-body">
                        <div class="form-group">
                            <label for="question">question</label>
                            <input type="text" class="form-control" id="question" placeholder="Enter question"
                                name="questions[]" value="{{ old('question') }}">
                            <span class="text-danger">
                                @error('question')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea class="form-control" id="answer" placeholder="Enter the Description" name="answers[]"></textarea>
                            <span class="text-danger">
                                @error('answer')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button style="float: right" class="btn btn-danger text-white remove_item_btn">delete</button>
                </div>
            `)
         });

         $(document).on('click', '.remove_item_btn', function(e) {
            e.preventDefault();
            let item_tobe_removed = $(this).parent();
            $(item_tobe_removed).remove();
         });


    });
</script>

@endpush