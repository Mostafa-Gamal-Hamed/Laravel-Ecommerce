@extends("admin.layout")

@section("body")
    @include("errors")
    <h2 class="mb-2 text-center animate__animated animate__fadeIn animate__slow">{{__("words.Add Category")}}</h2>
    <form action="{{url("adminCategoriesChild/update/$category->id")}}" method="post" enctype="multipart/form-data" class="animate__animated animate__fadeIn animate__slow">
        @csrf
        @method('PUT')
        <h6 class="text-center m-3">{{__("words.Category Name")}}</h6>
        <div class="col-12 d-flex justify-content-center mb-2">
            <input type="text" name="name" value="{{__("words.$category->name")}}" class="form-control bg-light text-dark rounded w-50">
        </div>
        <div class="col-12 d-flex justify-content-center mb-2">
            <select name="category_id" class="form-select w-50 me-2">
                <option value="{{$category->category->id}}" hidden>{{__("words.{$category->category->name}")}}</option>
                @foreach ($parent as $parent)
                <option value="{{$parent->id}}">{{__("words.$parent->name")}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <input type="file" name="image" class="form-control bg-light text-dark rounded w-50">
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary col-3">{{__("words.Submit")}}</button>
        </div>
    </form>
@endsection