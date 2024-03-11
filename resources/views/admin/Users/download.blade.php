<style>
    .container{
        padding: 10px;
    }
    .container input{
        background-color: transparent;
        border: none;
    }
</style>
<div class="container">
    <h2>{{$order->products[0]->name}}</h2>
    <div class="d-flex">
        <h3>order Date: <{{$order->orderDate}}</h3>
    </div>

    <div>
        @if ($order->shippedDate == 0)
        <h3>Shipped Date: Not specified</h3>
        @else
        <h3>Shipped Date: {{$order->shippedDate}}</h3>
        @endif
    </div>

    <div>
        <h3>Status: {{$order->status}}</h3>
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

    <div class="d-flex">
        <h3>Product Name: {{$order->products[0]->name}}</h3>
    </div>

    <div class="d-flex">
        <h3>Product Price: {{$order->products[0]->price}}</h3>
    </div>

    <div class="d-flex">
        <h3>Offer Price: {{$order->products[0]->offerPrice}}</h3>
    </div>

    <div class="d-flex">
        <h3>Quantity: {{$order->quantity}}</h3>
    </div>

    <div class="d-flex">
        <h3>User Name: {{$order->users[0]->name}}</h3>
    </div>

    <div class="d-flex">
        <h3>User Email: {{$order->users[0]->email}}</h3>
    </div>

    <div class="d-flex">
        <h3>User Phone: 0{{$order->users[0]->phone}}</h3>
    </div>

    <div class="d-flex">
        <h3>User City: {{$order->users[0]->city}}</h3>
    </div>

    <div class="d-flex">
        <h3>User Address: {{$order->users[0]->address}}</h3>
    </div>
</div>
