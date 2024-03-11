@extends("admin.layout")

@section("body")
    {{-- Message --}}
    @include("errors")
    @include("success")

    <h2 class="text-center m-3 {{$color == "light" ? "text-dark" : "text-light"}} animate__animated animate__fadeIn animate__slow">{{$product->name}}</h2>
        <div class="row p-3 {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeIn animate__slow">
            {{-- Image --}}
            <div class="col">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="mx-2">
                        @if ($product->image2 != "")
                        <img src="{{asset("storage/$product->image2")}}" id="image2" class="image2 img-fluid img-thumbnail mb-3" style="cursor: pointer; max-height: 200px;max-width: 100px;" alt="Book Image2"><br>
                        @endif
                        @if ($product->image3 != "")
                        <img src="{{asset("storage/$product->image3")}}" id="image3" class="image3 img-fluid img-thumbnail" style="cursor: pointer; max-height: 200px;max-width: 100px;" alt="Book Image3">
                        @endif
                    </div>
                    <img src="{{asset("storage/$product->image1")}}" id="image1" class="image1 img-fluid img-thumbnail" style="max-height: 400px;max-width: 400px;" alt="Book Image1">
                </div>
            </div>
            {{-- Description and Actions --}}
            <div class="col">
                <h3>{{__("words.Small description")}}</h3>
                {{$product->smallDesc}}<br>
                <div class="d-flex mt-3">
                    <div class="col text-center">
                        <h4>{{__("words.Price")}}</h4>
                        {{$product->price}}<br>
                    </div>
                    <div class="col text-center">
                        <h4>{{__("words.Offer Price")}}</h4>
                        {{$product->offerPrice}}<br>
                    </div>
                    <div class="col text-center">
                        <h4>{{__("words.Quantity")}}</h4>
                        {{$product->quantity}}<br>
                    </div>
                    <div class="col text-center">
                        <h4>{{__("words.Category")}}</h4>
                        {{$product->categoryChild->name}}<br>
                    </div>
                </div>
                <hr>
                <div class="d-flex align-content-center mt-3">
                    <a href="{{url("adminEditProduct/$product->id")}}" class="btn btn-primary me-3">{{__("words.Edit")}}</a>
                    <form action="{{url("adminDeleteProduct/$product->id")}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">{{__("words.Delete")}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex mt-5 align-items-center {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">
            <h2 class="col-3">{{__("words.Description")}}</h2>
            <h4 class="col-9 border-start border-2 border-light {{$color == "light" ? "bg-light text-dark border-dark" : "bg-dark text-light border-light"}} px-2">{{$product->description}}</h4>
        </div>
@endsection
