@extends("admin.layout")

@section("body")
<div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeInRight animate__slow">
    <h2 class="card-title text-center mb-5">{{__("words.Products Table")}}</h2>
    @include("errors")
    @include("success")
    <div class="row mb-3">
        <h3 class="col text-start">Products: {{$count}}</h3>
    </div>
    <div class="table-responsive">
        @if ($products->isEmpty())
            <div class="alert alert-danger text-center">{{__("words.Products are empty")}}</div>
        @else
            <table class="table text-center">
                <thead class="{{$color == "light" ? "bg-dark text-light" : "bg-light text-dark"}}">
                <tr>
                    <th>{{__("words.Num")}}</th>
                    <th>{{__("words.Name")}}</th>
                    <th>{{__("words.Price")}}</th>
                    <th>{{__("words.Offer Price")}}</th>
                    <th>{{__("words.Image")}}</th>
                    <th>{{__("words.Quantity")}}</th>
                    <th>{{__("words.Category")}}</th>
                    <th colspan="2">{{__("words.Action")}}</th>
                </tr>
                </thead>
                <tbody class="{{$color == "light" ? "text-dark" : "text-light"}}">
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->offerPrice}}</td>
                            <td><img src="{{asset("storage/$product->image1")}}" width="60px" alt="Product"></td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->categoryChild->name}}</td>
                            <td><a href="{{url("adminEditProduct/$product->id")}}" class="btn btn-primary me-3">{{__("words.Edit")}}</a></td>
                            <td><a href="{{url("adminShowProduct/$product->id")}}" class="btn btn-info">{{__("words.Details")}}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection