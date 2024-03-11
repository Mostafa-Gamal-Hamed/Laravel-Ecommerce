@extends('user.layout')

@section('title')
    Products
@endsection

@section('body')
<div class="page-heading about-heading header-text">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content animate__animated animate__fadeInLeft animate__slow">
                    @if (session()->has("lang") && session()->get("lang") == "en")
                    <h2>Our <span class="text-danger">Products</span></h2>
                    @else
                    <h2>{{__("words.Our Products")}}</h2>
                    @endif
                    <hr class="bg-danger mb-5 w-25 rounded-top" style="padding: 3px;">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    @include('success')
    <div class="col-12 mb-4 float-end d-flex justify-content-end">
        <form action="{{ url('search') }}" method="get" class="d-flex col-4" role="search">
            @csrf
            <input class="form-control me-2" type="search" name="search" placeholder="Search Product" aria-label="Search">
            <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>
    </div>
    @if ($products->isEmpty())
        <div class="alert alert-danger text-center"><strong>Nothing To Show</strong></div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="{{url("showProduct/$product->id")}}"><img src="{{ asset("storage/$product->image1") }}"
                                style="width:100%;height:300px;object-fit:contain;" alt=""></a>
                        <div class="down-content">
                            <a href="{{url("showProduct/$product->id")}}">
                                <h4>{{ $product->name }}</h4>
                            </a>
                            @if ($product->offerPrice == 0)
                                <h5 class="mb-2">${{ $product->price }}</h5>
                            @else
                                <div class="row mb-2">
                                    <h5 class="col-6"><del class="text-secondary">${{ $product->price }}</del></h5>
                                    <h5 class="col-6">${{ $product->offerPrice }}</h5>
                                </div>
                            @endif
                            <p style="max-height:100px;overflow-y:auto;">{{ $product->smallDesc }}.</p>
                            <form action="{{url("addToCart/$product->id")}}" method="post" class="d-flex justify-content-end mb-2">
                                @csrf
                                <input type="number" class="form-control col mt-1" name="quantity" value="1" hidden readonly>
                                <button type="submit" class="btn" title="Add to Cart"><i class="fa fa-shopping-cart text-danger" aria-hidden="true"></i></button>
                            </form>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>Reviews (24)</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    {{$products->links()}}
</div>
@endsection
