@extends("include.app")
@section("content")
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <div class="row">

    @include("bootstrapHelper.alerts")

        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">{{__("adminaddcategory.Add New Category")}}</h3>
                <div class=" white-box">
                    <form method="post" action="{{route("category.store")}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{__("adminaddcategory.Enter Category Name")}}</label>
                            <input type="text" name="name"  class="form-control" id="" value="{{old("name")}}" placeholder="{{__('adminaddcategory.Enter Category Name')}}">
                        </div>
                        <button type="submit" class="btn btn-outline-success m-t-15">{{__("adminaddcategory.Add Category")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
