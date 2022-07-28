@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a class="btn btn-primary" href="{{route("uploadpage")}}">
                    {{__("userhome.Upload Your Book")}}
                </a>
                <div class="card-header">
                    {{__("userhome.All Website Books")}}
                </div>
                <div class="card-body">

                @forelse($books as $book)
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{asset("storage/BooksImages/".$book->image)}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$book->title}}</h5>
                            <p class="card-text">{{$book->info}}</p>
                            <a href="{{asset("storage/BooksFiles/".$book->file)}}" class="btn btn-primary">{{__("userhome.Download")}}</a>
                            <a href="{{route("user.book",$book->id)}}" class="btn btn-outline-dark">{{__("userhome.More Info")}}</a>
                        </div>
                    </div>
                    <hr>`
                    @empty
                        {{__("userhome.Thers is no books to show")}}
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
