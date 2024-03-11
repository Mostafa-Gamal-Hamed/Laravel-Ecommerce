@extends("user.layout")

@section("title")
RESTING CLOTHES
@endsection
{{--  --}}
@section("body")
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Page Content -->
    <!-- Slider Starts Here -->
    @include("user.slider")
    <!-- Slider Ends Here -->
    @include("success")
    @include("errors")

    {{-- Images --}}
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-8">
                <img src="{{asset("assets/images/home_0.png")}}" class="img-fluid" alt="image">
            </div>
            <div class="col-4">
                <div class="col-12">
                    <img src="{{asset("assets/images/home_2.jpg")}}" style="max-height: 170px;width: 270px" class="img-fluid" alt="image">
                </div>
                <div class="col-12">
                    <img src="{{asset("assets/images/home_3.png")}}" style="max-height: 170px;width: 270px" class="img-fluid" alt="image">
                </div>
            </div>
        </div>
    </div>

    {{-- Latest Products --}}
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>{{__("words.Latest Products")}}</h2>
                        <a href="{{URL('products')}}">{{__("words.View all")}} <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="product-item">
                            <a href="{{url("showProduct/$product->id")}}"><img src="{{asset("storage/$product->image1")}}" style="width:100%;height:300px;object-fit:contain;" alt=""></a>
                            <div class="down-content">
                                <a href="{{url("showProduct/$product->id")}}">
                                    <h4>{{$product->name}}</h4>
                                </a>
                                @if ($product->offerPrice == 0)
                                    <h5 class="mb-2">${{$product->price}}</h5>
                                @else
                                    <div class="row mb-2">
                                        <h5 class="col-6"><del class="text-secondary">${{$product->price}}</del></h5>
                                        <h5 class="col-6">${{$product->offerPrice}}</h5>
                                    </div>
                                @endif
                                <p style="max-height:100px;overflow-y:auto;">{{$product->smallDesc}}.</p>
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
                                <span>{{__("words.Reviews")}} (24)</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Categories --}}
    <div class="container mb-5">
        <div class="d-flex justify-content-between">
            @foreach ($categories as $category)
            <a href="{{url("categoryProducts/$category->id")}}">
                <img src="{{asset("storage/$category->image")}}" class="img--fluid rounded-circle" style="height:100px;width:100px;" alt="category">
                <p class="text-center">{{__("words.$category->name")}}</p>
            </a>
            @endforeach
        </div>
    </div>

    {{-- Image --}}
    <a href="{{url('products')}}">
        <img src="{{asset("assets/images/home_1.png")}}" class="img-fluid border" alt="...">
    </a>

    {{-- About us --}}
    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>{{__("words.About RESTING CLOTHES")}}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <p>
                        {{__("words.where fashion meets innovation. we are a lifestyle statement, dedicated to curating unparalleled style experiences for the fashion-forward.")}}
                        {{__("words.With an unwavering commitment to quality, creativity, and sustainability, we weave together threads of elegance, comfort, and trendsetting designs that transcend seasons and boundaries. Our collections are more than mere garments;")}}
                        {{__("words.they are stories waiting to be worn, expressing individuality, confidence, and a passion for exceptional craftsmanship. Welcome to a world where clothing is not just fabric—it's an embodiment of artistry and distinction.")}}
                        </p>
                        <ul class="featured-list">
                            <li><a href="#">{{__("words.Clothes that represent you.")}}</a></li>
                            <li><a href="#">{{__("words.We make it right.")}}</a></li>
                            <li><a href="#">{{__("words.And when it fits right, it just feels so right.")}}</a></li>
                            <li><a href="#">{{__("words.Feeling bold Feeling secure.")}}</a></li>
                            <li><a href="#">{{__("words.perfect fit garments to your specifications giving you the confidence to take everything on.")}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="{{asset("assets/images/home_4.jpg")}}" class="img-fluid" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
