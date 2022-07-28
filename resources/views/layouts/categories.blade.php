<div class="p-3 mb-2 bg-light text-light">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{__("layoutcategories.Categories")}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @if (count($allcategories) > 0)
                    @foreach($allcategories as $category)
                        <th><a href="{{route("user.category",$category->id)}}">{{$category->name}}</a> </th>
                    @endforeach
            @endif
        </tr>
    </table>
</div>

