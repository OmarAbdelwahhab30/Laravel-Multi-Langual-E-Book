@extends("include.app")
@section("content")
@include("bootstrapHelper.alerts")

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__("admincategories.Category_Name")}}</th>
                        <th scope="col">{{__("admincategories.Handle")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>
                                <button type="button" onclick="DeleteCategory({{$category->id}})"
                                        class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal">
                                    {{__("admincategories.Delete")}}
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                {{__("admincategories.There is no category to show")}}
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    <!--Delete  Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__("admincategories.Category Deletion")}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{__("admincategories.Are you sure to delete this category?")}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("admincategories.close")}}</button>
                    <form method="post" action="{{route('category.destroy')}}">
                        @csrf
                        <input type="hidden"  id="categoryid" name="categoryid">
                        <button type="submit" class="btn btn-danger">{{__("admincategories.Delete")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function DeleteCategory(categoryid) {
            $("#categoryid").val(categoryid);
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
