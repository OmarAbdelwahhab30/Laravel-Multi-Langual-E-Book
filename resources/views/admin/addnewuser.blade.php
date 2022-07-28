@extends("include.app")
@section("content")
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has("success"))
        <div class="alert alert-success" role="alert">
            {{Session::get("success")}}
        </div>
    @endif
    @if(Session::has("fail"))
        <div class="alert alert-success" role="alert">
            {{Session::get("fail")}}
        </div>
    @endif


    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">{{__("adminadduser.Add New User")}}</h3>
            <div class=" white-box">
                <form method="post" action="{{route("users.store")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">{{__("adminadduser.username")}}</label>
                        <input type="text" name="username"  class="form-control" id="" value="{{old("username")}}" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">{{__("adminadduser.email")}}</label>
                        <input type="email" name="email" class="form-control"  id="" value="{{old("email")}}" rows="3" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">{{__("adminadduser.phone")}}</label>
                        <input type="tel" name="phone" class="form-control"  id="" value="{{old("phone")}}" >

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">{{__("adminadduser.password")}}</label>
                        <input type="password" name="password" class="form-control"  id="" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">{{__("adminadduser.repassword")}}</label>
                        <input type="password" name="password_confirmation" class="form-control"   id="" >
                    </div>
                    <div>
                        <label for="formFileLg" class="form-label">{{__("adminadduser.img")}}</label>
                        <input class="form-control form-control-lg" name="img"  id="formFileLg" type="file">
                    </div>
                    <button type="submit" class="btn btn-outline-success m-t-15">{{__("adminadduser.adduser")}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
