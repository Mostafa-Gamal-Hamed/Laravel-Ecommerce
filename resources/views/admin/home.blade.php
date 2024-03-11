@extends('admin.layout')

@section("title")
{{__("words.Admin Page")}}
@endsection

{{-- DashBoard Page --}}
@section('body')


    {{-- Count Start --}}
    <div class="row animate__animated animate__fadeInDown animate__slow">
        <div class="col-sm-3 grid-margin">
            <div class="card shadow bg-body-tertiary rounded {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light border"}}">
                <div class="card-body">
                <h5>{{__("words.Categories")}}</h5>
                <div class="row">
                    <div class="col-8 text-center col-sm-12 col-xl-8 my-auto">
                        <h3>{{__("words.Total")}}</h3>
                        <div class="d-flex d-sm-block align-items-center">
                            <h2 class="mb-0">{{$cate_count}}</h2>
                        </div>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-library-books text-info ms-auto"></i>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 grid-margin">
            <div class="card shadow bg-body-tertiary rounded {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light border"}}">
                <div class="card-body">
                <h5>{{__("words.Categories Child")}}</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 text-center col-xl-8 my-auto">
                        <h3>{{__("words.Total")}}</h3>
                    <div class="d-flex d-sm-block align-items-center">
                        <h2 class="mb-0">{{$child_count}}</h2>
                    </div>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-library-books text-danger ms-auto"></i>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 grid-margin">
            <div class="card shadow bg-body-tertiary rounded {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light border"}}">
                <div class="card-body">
                <h5>{{__("words.Products")}}</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <h3>{{__("words.Total")}}</h3>
                    <div class="d-flex d-sm-block text-center align-items-center">
                        <h2 class="mb-0">{{$prod_count}}</h2>
                    </div>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 grid-margin">
            <div class="card shadow bg-body-tertiary rounded {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light border"}}">
                <div class="card-body">
                <h5>{{__("words.Orders")}}</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <h3>{{__("words.Total")}}</h3>
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0">{{$order_count}}</h2>
                    </div>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-border-all text-success ms-auto"></i>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Count End --}}
    <div class="row animate__animated animate__fadeInUp animate__slow">
        {{-- All Categories Start --}}
        <div class="col-md-6 grid-margin stretch-card" style="max-height: 400px;">
            <div class="overflow-auto shadow bg-body-tertiary rounded w-100 {{$color == "dark" ? "border" : "border-0"}}">
                <div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">{{__("words.Categories")}}</h4>
                        <a href="{{url('categories')}}" class="text-muted mb-1 small">{{__("words.View all")}}</a>
                    </div>
                    @foreach ($categories as $category)
                        <div class="preview-list">
                            <div class="preview-item border-bottom">
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                        <h6 class="preview-subject">{{$category->name}}</h6>
                                        <p class="text-muted text-small">{{$category->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- All Categories End --}}

        {{-- All CategoriesChild Start --}}
        <div class="col-md-6 grid-margin stretch-card" style="max-height: 400px;">
            <div class="overflow-auto shadow bg-body-tertiary rounded w-100 {{$color == "dark" ? "border" : "border-0"}}">
                <div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">{{__("words.Categories Child")}}</h4>
                        <a href="{{url('categoriesChild')}}" class="text-muted mb-1 small">{{__("words.View all")}}</a>
                    </div>
                    @foreach ($categoriesChild as $child)
                        <div class="preview-list">
                            <div class="preview-item border-bottom">
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                        <h6 class="preview-subject">{{$child->name}}</h6>
                                        <p class="text-muted text-small">{{$child->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- All CategoriesChild End --}}

        {{-- All Products Start --}}
        <div class="col-md-12 grid-margin stretch-card" style="max-height: 400px;">
            <div class="overflow-auto shadow bg-body-tertiary rounded w-100 {{$color == "dark" ? "border" : "border-0"}}">
                <div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">{{__("words.Products")}}</h4>
                        <a href="{{url('products')}}" class="text-muted mb-1 small">{{__("words.View all")}}</a>
                    </div>
                    @foreach ($products as $product)
                        <div class="preview-list">
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <img src="{{asset("storage/$product->image1")}}" alt="image" class="rounded-circle"/>
                                </div>
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h5 class="preview-subject"><a class="nav-link {{$color == "light" ? "text-dark" : "text-light"}}" href="{{url("adminShowProduct/$product->id")}}">{{$product->name}}</a></h5>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="datetime-local" class="text-muted d-flex justify-content-end bg-transparent border-0 w-25" id="birthdaytime" value="{{$product->created_at}}" name="birthdaytime" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- All Products End --}}

        {{-- All Orders Start --}}
        <div class="col-md-12 grid-margin stretch-card" style="max-height: 400px;">
            <div class="overflow-auto shadow bg-body-tertiary rounded w-100 {{$color == "dark" ? "border" : "border-0"}}">
                <div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">{{__("words.Orders")}}</h4>
                        <a href="{{url('orders')}}" class="text-muted mb-1 small">{{__("words.View all")}}</a>
                    </div>
                    @foreach ($orders as $order)
                        <div class="preview-list">
                            <div class="preview-item border-bottom">
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h5 class="preview-subject"><a class="nav-link {{$color == "light" ? "text-dark" : "text-light"}}" href="{{url("products/show/$order->id")}}">{{$order->products[0]->name}}</a></h5>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="datetime-local" class="text-muted d-flex justify-content-end bg-transparent border-0 w-25" id="birthdaytime" value="{{$order->orderDate}}" name="birthdaytime" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- All Orders End --}}
    </div>

@endsection
