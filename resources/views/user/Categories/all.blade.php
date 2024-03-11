@extends('user.layout')

@section('title')
    Categories
@endsection

@section('body')
<div class="page-heading about-heading header-text">

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content animate__animated animate__fadeInLeft animate__slow">
                        @if (session()->has("lang") && session()->get("lang") == "en")
                        <h2>{{$categories->name}}</h2>
                        @else
                        <h2>{{__("words.$categories->name")}}</h2>
                        @endif
                        <hr class="bg-danger mb-5 w-25 rounded-top" style="padding: 3px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        @include('success')
        @if ($categories->categoryChild->isEmpty())
            <div class="alert alert-danger text-center"><strong>There Is No Categories</strong></div>
        @else
            <div class="row">
                @foreach ($categories->categoryChild as $category)
                    <div class="col-md-4 text-center">
                        <div class="product-item">
                            <div class="down-content">
                                <img src="{{asset("storage/$category->image")}}" class="img-fluid" style="max-height:250px;" alt="">
                                <a href="{{url("showCategory/$category->id")}}">
                                    <h4>{{ __("words.$category->name") }}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
