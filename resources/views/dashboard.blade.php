<?php
    $orders    = App\Models\Order::where("status","!=","delivered")->where("user_id",Auth::user()->id)->get();
    $userOrder = App\Models\UserOrders::where("user_id",Auth::user()->id)->get();
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="mt-3 container">
        @include("success")
        @include("errors")
        {{-- Orders worked on --}}
        <div class="bg-light shadow p-3 mb-3 bg-body-tertiary rounded col animate__animated animate__fadeInUp animate__slow" style="max-height:305px;overflow-y:auto;">
            <h1 class="text-center text-primary mb-2" style="font-size: 25px;font-weight:bolder;">Orders are being worked on</h1>
            <h2 class="mb-4">Orders: <span class="text-primary">{{$orders->count()}}</span></h2>
            @if ($orders->isEmpty())
            <div class="text-center text-danger">There Is No Orders
                <span class="text-dark">/</span>
                <a href="{{url('products')}}" class="nave-link text-primary text-center">Make Orders</a>
            </div>
            @endif
            {{-- Show Orders --}}
            @foreach ($orders as $order)
                <div class="d-flex m-3">
                    <img class="col" src="{{ asset("storage/{$order->products[0]->image}") }}"
                        style="max-height:75px;max-width:75px;" alt="">
                    <div class="col">
                        <h6>{{$order->products[0]->name}}</h6>
                        @if ($order->shippedDate == 0)
                        <h6>Arrival Date: Not Specify</h6>
                        @else
                        <div>
                            <h6>Arrival Date:<input type="date" value="{{$order->shippedDate}}" class="border-0 bg-warning rounded" readonly></h6>
                        </div>
                        @endif
                    </div>

                    <div>
                        @if ($order->status == "shipped")
                        <h6 class="bg-warning p-2">Status: {{$order->status}}</h6>
                        @else
                        <h6>Status: {{$order->status}}</h6>
                        @endif
                    </div>
                    <div class="col text-center">
                        @if ($order->products[0]->offerPrice == 0)
                        <h4>${{$order->products[0]->price}}</h4>
                        @else
                        <h4>${{$order->products[0]->offerPrice}}</h4>
                        <h4><del>${{$order->products[0]->price}}</del></h4>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-between border-bottom">
                    <form action="{{ url("cancelOrder/$order->id") }}" method="post" class="col mb-2">
                        <h3>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger border-0 btn-md"
                            onclick="confirm('Are You Sure?')">Cancel Order</button>
                        </h3>
                    </form>
                    <h3 class="col text-center mb-2">Quantity: {{$order->quantity}}</h3>
                </div>
            @endforeach
        </div>
        <hr style="color:#d6d7d8; border:3px solid; margin-bottom:15px;">
        {{-- Orders Delivered --}}
        <div class="bg-light shadow p-3 mb-3 bg-body-tertiary rounded col animate__animated animate__fadeInUp animate__slow">
            <h1 class="text-center text-info mb-2" style="font-size: 25px;font-weight:bolder;">Orders have been delivered</h1>
            <h2 class="mb-4">Orders: <span class="text-primary">{{$userOrder->count()}}</span></h2>
            @if ($userOrder->isEmpty())
            <div class="text-center text-danger">There Is No Orders
                <span class="text-dark">/</span>
                <a href="{{url('products')}}" class="nave-link text-primary text-center">Make Orders</a>
            </div>
            @endif
            {{-- Orders Carousel --}}
            <div class="owl-carousel" style="display: block;max-height:20rem;">
                @foreach ($userOrder as $order)
                    <div class="item border rounded" style="max-height:100%;">
                        <img class="col object-fit-xxl-contain border rounded" src="{{ asset("storage/{$order->products[0]->image}") }}" style="max-height:10rem;object-fit-xxl-contain border rounded">
                        <div class="col">
                            <p class="text-center m-2">{{$order->products[0]->name}}</p>
                        </div>
                        <div class="col d-flex justify-content-between">
                            <h4>Quantity: {{$order->quantity}}</h4>
                            <h4>Price: ${{$order->products[0]->price}}</h4>
                        </div>
                        <div class="col">
                            <h4>Order Date: <input type="datetime-local" value="{{$order->orderDate}}" class="border-0 bg-transparent" readonly></h4>
                        </div>
                        <div class="col">
                            <h4>Arrival Date:<input type="date" value="{{$order->shippedDate}}" class="border-0" readonly></h4>
                        </div>
                        <form action="{{ url("removeOrder/$order->id") }}" method="post" class="col text-center">
                            @csrf
                            @method('DELETE')
                            <h3>
                                <button class="btn btn-outline-danger border-0 btn-md"
                                onclick="confirm('Are You Sure?')">Remove</button>
                            </h3>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</x-app-layout>
