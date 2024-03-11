@extends("admin.layout")

@section("body")
<div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeIn animate__slow">
    <h2 class="card-title text-center mb-5">Order Number {{$order->id}}</h2>
    @include("success")
    @include("errors")

    <div class="bg-light text-dark shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="container">
            <div class="d-flex">
                <h4>order Date: <input type="datetime-local" class="text-center bg-transparent border-0" value="{{$order->orderDate}}" readonly></h4>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                @if ($order->shippedDate == 0)
                <h4>Shipped Date: Not specified</h4>
                <form action="{{url("shippedDate/$order->id")}}" method="post">
                    @csrf
                    @method("PUT")
                    <input type="date" name="shippedDate" class="bg-secondary-subtle border-0">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @else
                <h4>Shipped Date: <input type="date" class="text-center bg-transparent border-0" value="{{$order->shippedDate}}" readonly></h4>
                @endif
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <h4>Status: {{$order->status}}</h4>
                <form action="{{url("status/$order->id")}}" method="post">
                    @csrf
                    @method("PUT")
                    @if ($order->status == "notShipped")
                        <input type="text" name="status" value="shipped" readonly hidden>
                        <button type="submit" class="btn btn-md btn-info">Shipped</button>
                    @elseif ($order->status == "shipped")
                        <input type="text" name="status" value="delivered" readonly hidden>
                        <button type="submit" class="btn btn-md btn-info">Delivered</button>
                    @endif
                </form>
            </div>
            <hr>
            <div class="d-flex">
                <h4>Product Name: {{$order->products[0]->name}}</h4>
            </div>
            <hr>
            <div class="d-flex">
                <h4>Product Price: {{$order->products[0]->price}}</h4>
            </div>
            <hr>
            <div class="d-flex">
                <h4>Offer Price: {{$order->products[0]->offerPrice}}</h4>
            </div>
            <hr>
            <div class="d-flex">
                <h4>Quantity: {{$order->quantity}}</h4>
            </div>
            <hr>
            <div class="d-flex">
                <h4>User Name: {{$order->users[0]->name}}</h4>
            </div>
            <hr>
            <div class="d-flex">
                <h4>User Email: {{$order->users[0]->email}}</h4>
            </div>
            <hr>
            <div class="d-flex">
                <h4>User Phone: 0{{$order->users[0]->phone}}</h4>
            </div>
            <hr>
            <div class="d-flex">
                <h4>User City: {{$order->users[0]->city}}</h4>
            </div>
            <hr>
            <div class="d-flex">
                <h4>User Address: {{$order->users[0]->address}}</h4>
            </div>
        </div>
    </div>
        <form action="{{url("download/$order->id")}}" method="get">
            @csrf
            <button type="submit" class="btn btn-danger">Download PDF</button>
        </form>

</div>
@endsection