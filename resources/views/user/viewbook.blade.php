@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <hr>
        <div class="panel-body">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{asset("storage/BooksImages/".$book->image)}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">{{$book->info}}</p>
                        <p class="card-text text-muted">{{__("usercategory.download Times")}}:{{$book->nums_of_download}}</p>
                        <a href="#" id="down" onclick="Fire();" onmousedown="downloadd();"     class="btn btn-primary">{{__("usercategory.Download")}}</a>
                        <script>
                            function downloadd() {
                                window.open('{{asset("storage/BooksFiles/".$book->file)}}');
                            }
                            function Fire() {
                                    window.open('{{route("bookEvent.fire",$book->id)}}');
                                }
                    </script>
                        @if(Auth::user()->id === $book->user_id)
                            <a href="{{route("book.delete",$book->id)}}" class="btn btn-danger">{{__("usercategory.Delete")}}</a>
                        @endif
                    </div>
                </div>
                <hr>
            @include("layouts.commentsBox")
        </div>
    </div>

@endsection
