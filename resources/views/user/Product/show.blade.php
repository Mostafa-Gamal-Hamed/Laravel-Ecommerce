@extends("user.layout")

@section("title")
{{$product->name}}
@endsection
<style>
    .image_1{
        max-height: 400px;width: auto;
    }
    .image_2 , .image_3 {
        max-height: 200px;max-width: 100px;
    }
</style>
@section("body")
<div style="height: 80px;"></div>
    <div class="container mt-5">
        @include("success")
        <h1 class="text-center animate__animated animate__fadeInDown animate__slow">{{$product->name}}</h1>
        <hr class="bg-danger mb-5 w-25 rounded-top" style="padding: 3px;">
        <div class="d-flex mt-5">
            {{-- Image --}}
            <div class="col-5 d-flex animate__animated animate__fadeInLeft animate__slow">
                <div>
                    @if ($product->image2 != "")
                    <img src="{{asset("storage/$product->image2")}}" class="image_2 img-fluid img-thumbnail" alt="Book Image"><br>
                    @endif
                    @if ($product->image3 != "")
                    <img src="{{asset("storage/$product->image3")}}" class="image_3 img-fluid img-thumbnail" alt="Book Image">
                    @endif
                </div>
                <img src="{{asset("storage/$product->image1")}}" class="image_1 img-fluid img-thumbnail" alt="Book Image">
            </div>
            {{-- Description and Actions --}}
            <div class="col-7 animate__animated animate__fadeInRight animate__slow">
                {{$product->smallDesc}}<br><br>
                <p>{{$product->categoryChild->category->name}}/{{$product->categoryChild->name}}</p><br>
                <div>
                    @if ($product->offerPrice == 0)
                        <h5>Price:</h5>
                        <h5 class="mb-2">${{ $product->price }}</h5>
                    @else
                        <h5>Price:</h5>
                        <div class="row mb-2">
                            <h5 class="col-6"><del class="text-secondary">${{ $product->price }}</del></h5>
                            <h5 class="col-6">${{ $product->offerPrice }}</h5>
                        </div>
                    @endif
                </div>
                <hr>
                <form action="{{url("addToCart/$product->id")}}" method="post">
                    @csrf
                    <div class="col">
                        <h5>Quantity:</h5>
                        <input type="number" class="form-control col mt-1" name="quantity" value="1" placeholder="Choose Quantity">
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg col mt-2" title="Add to Cart">Add To Cart</button>
                </form>
            </div>
        </div>
        <hr>
        <div>
            <h2 class="mb-3">Description</h2>
            <h5>{{$product->description}}</h5>
        </div>
    </div>
@endsection