@extends('layouts.app')

@section('content')
@include("bootstrapHelper.alerts")
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h2>{{$category->name}}</h2></div>
        <hr>
        <div class="panel-body">
            @forelse($books as $book)
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{asset("storage/BooksImages/".$book->image)}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">{{$book->info}}</p>
                        <a href="{{asset("storage/BooksFiles/".$book->file)}}" class="btn btn-primary">{{__("usercategory.Download")}}</a>
                        <a href="{{route("user.book",$book->id)}}" class="btn btn-outline-dark">{{__("usercategory.More Info")}}</a>
                    </div>
                </div>
                <hr>`
            @empty
                    {{'There is no books to show'}}
            @endforelse
        </div>
    </div>
@endsection
