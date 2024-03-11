@extends("admin.layout")

@section("body")
{{-- Users --}}
<div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeIn animate__slow">
    <h2 class="card-title text-center mb-5">{{__("words.Users Orders")}}</h2>
    <div class="w-100 text-end mb-2" id="search_btn">
        <a onclick="display()" role="button" class="text-decoration-none {{$color == "light" ? "text-dark" : "text-light"}}"><i class="mdi mdi-magnify"></i>{{__("words.Search")}}</a>
    </div>
    <div class="row mb-3">
        <h3 class="col text-start">{{__("words.Orders")}}: {{$count}}</h3>
        <div style="display: none;" class="col-7" id="search">
            <form action="{{ url('searchOrder') }}" method="get" class="d-flex {{$color == "light" ? "bg-dark text-light" : "bg-light text-dark"}}" role="search">
                @csrf
                <input class="form-control bg-light text-dark me-2" type="date" name="date" aria-label="Search">
                <input class="form-control bg-light text-dark me-2" type="number" name="search" placeholder="Search Order" aria-label="Search">
                <button class="btn {{$color == "light" ? "btn-dark" : "btn-light"}}" type="submit">{{__("words.Search")}}</button>
            </form>
        </div>
    </div>
    @include("errors")
    @include("success")
    <div class="table-responsive">
        @if ($orders->isEmpty())
            <div class="alert alert-danger text-center">{{__("words.There Is No Orders")}}</div>
        @else
            <table class="table text-center">
                <thead class="{{$color == "light" ? "bg-dark text-light" : "bg-light text-dark"}}">
                    <tr>
                        <th>{{__("words.Order id")}}</th>
                        <th>{{__("words.Order Date")}}</th>
                        <th>{{__("words.shippedDate")}}</th>
                        <th>{{__("words.Statues")}}</th>
                        <th>{{__("words.Name")}}</th>
                        <th>{{__("words.Quantity")}}</th>
                        <th>{{__("words.User Name")}}</th>
                        <th colspan="3">{{__("words.Action")}}</th>
                    </tr>
                </thead>
                <tbody class="{{$color == "light" ? "text-dark" : "text-light"}}">
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td><input type="datetime-local" class="text-center bg-transparent border-0 text-light" value="{{$order->orderDate}}" readonly></td>
                            @if ($order->shippedDate == 0)
                            <td>{{__("words.Not specified")}}</td>
                            @else
                            <td><input type="date" class="text-center bg-transparent border-0 text-light" value="{{$order->shippedDate}}" readonly></td>
                            @endif
                            <td>{{$order->status}}</td>
                            <td>{{$order->products[0]->name}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->users[0]->name}}</td>
                            <td><a href="{{url("showOrder/$order->id")}}" class="btn btn-sm btn-outline-info">{{__("words.Details")}}</a></td>
                            <td><a href="{{url("message/{$order->users[0]->id}")}}" class="btn btn-sm btn-outline-success">{{__("words.Message")}}</a></td>
                            <td>
                                <form action="{{url("deleteOrder/$order->id")}}" method="post" class="m-0">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-outline-danger">{{__("words.Delete")}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
<script src="{{asset("Admin/assets")}}/vendors/js/vendor.bundle.base.js"></script>
<script>
    function display() {
        var z = document.getElementById("search_btn");
        var x = document.getElementById("search");
        if (x.style.display === "none") {
            x.style.display = "block";
            z.style.display = "none";
        } else {
            x.style.display = "none";
        }
    }
</script>
