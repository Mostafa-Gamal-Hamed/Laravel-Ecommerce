@extends("admin.layout")

@section("body")
    @include("errors")
    <h2 class="mb-2 text-center animate__animated animate__fadeIn animate__slow">{{__("words.Edit Category")}}</h2>
    <form action="{{url("adminCategory/update/$category->id")}}" method="post" enctype="multipart/form-data" class="animate__animated animate__fadeIn animate__slow">
        @csrf
        @method('PUT')
        <h6 class="text-center m-3">{{__("words.Category Name")}}</h6>
        <input type="text" name="name" value="{{$category->name}}" class="form-control bg-light text-dark rounded w-50 m-auto">
        <input type="file" name="image" class="form-control bg-light text-dark rounded w-50 m-auto mt-1">
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary col-3">{{__("words.Submit")}}</button>
        </div>
    </form>
@endsection