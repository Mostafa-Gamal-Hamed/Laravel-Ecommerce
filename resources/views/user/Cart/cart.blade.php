@extends('user.layout')

@section('title')
    My Cart
@endsection

@section('body')
    <div class="page-heading about-heading header-text" style="height: 400px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content animate__animated animate__fadeInLeft animate__slow">
                        @if (session()->has("lang") && session()->get("lang") == "en")
                        <h2>My <span class="text-danger">Cart</span></h2>
                        @else
                        <h2>{{__("words.My Cart")}}</h2>
                        @endif
                        <hr class="bg-danger mb-5 w-25 rounded-top" style="padding: 3px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        @include('success')
        @if ($cart->isEmpty())
            @if (session()->has("lang") && session()->get("lang") == "en")
            <h1 class="text-center">Cart Is<span class="text-danger"> Empty</span></h1>
            @else
            <h2>{{__("words.Cart Is Empty")}}</h2>
            @endif
        @else
            <div class="row justify-content-between">
                {{-- Cart Products --}}
                <div class="row col-8 justify-content-between">

                    {{-- Remove All --}}
                    <form action="{{ url('removeAllCart') }}" method="post" class="col-12 d-flex justify-content-end">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-transparent border-0 text-danger mb-2"
                            onclick="confirm('Are You Sure?')">{{__("words.Remove All")}}</button>
                    </form>
                    {{-- Products --}}
                    <div class="bg-light shadow p-3 mb-5 bg-body-tertiary rounded">
                        <div class="col-12 border-bottom">
                            <h5 class="p-1">{{__("words.Cart")}} ({{$count}})</h5>
                        </div>
                        @foreach ($cart as $cart)
                            <div class="d-flex m-3">
                                <img class="col" src="{{ asset("storage/$cart->image") }}"
                                    style="max-height:75px;max-width:75px;" alt="">
                                <div class="col">
                                    <h6>{{$cart->name}}</h6>
                                    <p>{{$cart->product->smallDesc}}</p>
                                    <p class="text-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{$cart->product->quantity}} {{__("words.Unites left")}}</p>
                                </div>
                                <div class="col text-center">
                                    @if ($cart->offerPrice == 0)
                                        <h4>${{$cart->price}}</h4>
                                    @else
                                        <h4>${{$cart->offerPrice}}</h4>
                                        <h5><del style="color:#75757a;">${{$cart->price}}</del>
                                            {{-- offer percent --}}
                                            <span style="color:#f8981e;background-color:#fef3e9;font-size:17px;">
                                                -<?php $s= $cart->price - $cart->offerPrice; $a= $s / $cart->offerPrice * 100 ; echo round($a); ?>%
                                            </span>
                                        </h5>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-between border-bottom">
                                <form action="{{ url("removeFromCart/$cart->id") }}" method="post" class="col mb-2">
                                    <h3>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger border-0 btn-md"
                                        onclick="confirm('Are You Sure?')">{{__("words.Remove")}}</button>
                                    </h3>
                                </form>
                                <h3 class="col text-center mb-2">{{__("words.Quantity")}}: {{$cart->quantity}}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- CART SUMMARY --}}
                <div class="bg-light col-3 shadow p-3 mb-5 bg-body-tertiary rounded" style="height: 250px;">
                    <div class="border-bottom"><h5>{{__("words.CART SUMMARY")}}</h5></div>
                    <div class="text-center border-bottom p-1">
                        @foreach ($all as $all)
                            <h6>{{$all->name}}</h6>
                        @endforeach
                    </div>
                    <p class="text-center m-3 border-bottom p-2">{{__("words.Cash On Delivery")}}</p>
                    <form action="{{ url('makeOrder') }}" method="post" class="w-100">
                        @csrf
                        <button type="submit" class="btn btn-warning w-100">{{__("words.Confirm")}}</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
