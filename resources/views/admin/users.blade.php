@extends("include.app")
@section("content")
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
@include("bootstrapHelper.alerts")

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__("adminusers.Image")}}</th>
                    <th scope="col">{{__("adminusers.Username")}}</th>
                    <th scope="col">{{__("adminusers.Email")}}</th>
                    <th scope="col">{{__("adminusers.Phone")}}</th>
                    <th scope="col">{{__("adminusers.Banned")}}</th>
                    <th scope="col">{{__("adminusers.Role")}}</th>
                    <th scope="col">{{__("adminusers.Handle")}}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <th scope="row">{{$user->user_id}}</th>
                        <td>
                            <img style="width: 35px;height: 35px;border-radius: 50%;" src="{{asset("storage/UsersImages/".$user->img)}}" />
                        </td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->ban}}</td>
                        {{$role = $user->role_id == 1 ? "Admin":"User"}}
                        <td>{{$role}}</td>
                        <td>
                            <button type="button" onclick="DeleteUser({{$user->user_id}})"
                                    class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal">
                                {{__("adminusers.Delete")}}
                            </button>
                            <a href="{{route("user.set",$user->user_id)}}" class="btn btn-outline-info">{{__("adminusers.Change Role")}}</a>
                            <a href="{{route("user.ban",['userid'=>$user->user_id,'currentStatus'=>$user->ban])}}" class="btn btn-danger">{{__("adminusers.Change-Ban-Status")}}</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            {{__("adminusers.There is no users to show")}}
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
<!--Delete  Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__("adminusers.User Deletion")}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{__("adminusers.Are you sure to delete this user ?")}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("adminusers.Close")}}</button>
                <form method="post" action="{{route('users.destroy')}}">
                    @csrf
                    <input type="hidden"  id="userid" name="userid">
                    <button type="submit" class="btn btn-danger">{{__("adminusers.Delete")}}</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function DeleteUser(userid) {
        $("#userid").val(userid);
    }
</script>


<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
@endsection
