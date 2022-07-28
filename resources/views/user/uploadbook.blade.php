@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                @include('bootstrapHelper.alerts')
                <form method="post" action="{{route("book.upload")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">{{__("userupload.Book name")}}</label>
                            <input type="text" name="bookname"  class="form-control" id="" value="{{old("bookname")}}" placeholder="{{__('userupload.Enter Book Name')}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">{{__('userupload.Author')}}</label>
                        <input type="text" name="author" class="form-control"  id="" value="{{old("author")}}" placeholder="{{__('userupload.Enter Author Name')}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">{{__('userupload.info')}}</label>
                        <textarea style="resize: none"  type="text" name="info" class="form-control" value="{{old("info")}}"  id="" placeholder="{{__('userupload.Enter Information of the book')}}">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category" >
                            @if (count($allcategories) > 0)
                                <option value="" selected disabled hidden>{{__('userupload.Choose category here')}}</option>
                                @foreach($allcategories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div>
                        <label for="formFileLg" class="form-label">{{__('userupload.Book File')}}</label>
                        <input class="form-control form-control-lg" name="file"  id="formFileLg" type="file">
                    </div>
                    <div>
                        <label for="formFileLg" class="form-label">{{__('userupload.Enter Book Image')}}</label>
                        <input class="form-control form-control-lg" name="img"  id="formFileLg" type="file">
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-5">{{__('userupload.Add Book')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
