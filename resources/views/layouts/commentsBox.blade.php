<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="card w-75 align-center" style="margin: 100px">
    <div class="card-header">
        {{__("usercommentbox.Comments")}}
    </div>
    @include("bootstrapHelper.alerts")
    <div class="card-body">
        <form action="{{route("book.comment",$book->id)}}" method="post">
            @csrf
            <div class="form-group">
                <textarea style="resize: none" class="form-control" name="comment" placeholder="{{__("usercommentbox.Enter Your Comment Here")}}"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="addcomment" class="btn btn-primary">{{__("usercommentbox.Add Comment")}}</button>
            </div>
        </form>
        <hr>
        @forelse($book->Comment as $comment)
            <div>
                <a  class="float-right"    href="{{route("comment.delete",$comment->id)}}">
                    <i style="color: red"  class="fa fa-trash" aria-hidden="true">
                    </i>
                </a>
                <div>
                    <img src="{{asset("storage/UsersImages/".$comment->user->img)}}" width="40px" height="40px" style="display: inline">
                    <h3 style="display: inline;margin-top: 3px">{{$comment->user->username}}</h3>
                </div>
                <div>
                    <span class="text-muted">{{$comment->created_at}}</span>
                <p>{{$comment->comment}}</p>
                </div>

            </div>
            <hr>
        @empty
            {{__("usercommentbox.There is no comments to show")}}
        @endforelse
    </div>
</div>
