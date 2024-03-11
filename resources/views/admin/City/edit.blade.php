@extends("Admin.layout")

@section("body")
    @include("errors")
    <h2 class="mb-2 text-center animate__animated animate__fadeIn animate__slow">{{__("words.Edit City")}}</h2>
    <form action="{{url("city/update/$city->id")}}" method="post" class="animate__animated animate__fadeIn animate__slow">
        @csrf
        @method('PUT')
        <h6 class="text-center m-3">{{__("words.City Name")}}:</h6>
        <input type="text" name="name" value="{{__("words.$city->name")}}" class="form-control bg-light text-dark rounded w-50 m-auto">
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary col-3">{{__("words.Submit")}}</button>
        </div>
    </form>
@endsection