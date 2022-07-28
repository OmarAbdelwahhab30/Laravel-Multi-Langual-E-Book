@extends("include.app")
@section("content")
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
@include("bootstrapHelper.alerts")
<div class="row">
    <section>
        <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{asset("storage/UsersImages/".Auth::user()->img)}}" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{Auth::user()->username}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__("admineditprofile.username")}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{Auth::user()->username}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__("admineditprofile.Email")}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{__("admineditprofile.Phone")}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{Auth::user()->phone}}</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                </div>
                    <h5>{{__("admineditprofile.Update your Profile Info")}}</h5>
                    <form method="post" action="{{route("users.update",Auth::user()->id)}}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{__("admineditprofile.username")}}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="text-muted mb-0 form-control" name="username" >                                 </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{__("admineditprofile.Email")}}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" >
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{__("admineditprofile.Phone")}}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0 form-control" name="phone" >
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-outline-success">{{__("admineditprofile.update")}}</button>
                            </div>
                        </div>
                    </div>
                    </form>

            </div>
        </div>
    </section>
</div>
<!-- Row -->
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
