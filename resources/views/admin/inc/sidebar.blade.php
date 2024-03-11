<nav class="sidebar sidebar-offcanvas {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeInLeft animate__slow" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">
        <a class="sidebar-brand brand-logo nav-link  {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}" href="{{url('home')}}">{{__("words.Admin Page")}}</a>
        <a class="sidebar-brand brand-logo-mini" href="{{url('home')}}"><img src="{{asset('admin/assets')}}/images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <ul class="nav  border-end {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{asset('admin/assets')}}/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}}</h5>
                        <span>{{__("words.Admin")}}</span>
                    </div>
                </div>
            </div>
        </li>
        {{-- Dashboard --}}
        <li class="nav-item nav-category">
            <span class="nav-link">{{__("words.Navigation")}}</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('home')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">{{__("words.Dashboard")}}</span>
            </a>
        </li>
        {{-- Category --}}
        <li class="nav-item nav-category">
            <span class="nav-link">{{__("words.Categories")}}</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('adminCategories')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-shape"></i>
                </span>
                <span class="menu-title">{{__("words.All Categories")}}</span>
            </a>
        </li>
        {{-- SubCategory --}}
        <li class="nav-item nav-category">
            <span class="nav-link">{{__("words.Categories Child")}}</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('adminCategoriesChild')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-shape-outline"></i>
                </span>
                <span class="menu-title">{{__("words.All Categories Child")}}</span>
            </a>
        </li>
        {{-- Product --}}
        <li class="nav-item nav-category">
            <span class="nav-link">{{__("words.Products")}}</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('adminProducts')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-archive"></i>
                </span>
                <span class="menu-title">{{__("words.All Products")}}</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('adminAddProduct')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus"></i>
                </span>
                <span class="menu-title">+{{__("words.Add Product")}}</span>
            </a>
        </li>
        {{-- City --}}
        <li class="nav-item nav-category">
            <span class="nav-link">{{__("words.Cities")}}</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('city')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-city"></i>
                </span>
                <span class="menu-title">{{__("words.Cities")}}</span>
            </a>
        </li>
        {{-- Admins And Users --}}
        <li class="nav-item nav-category">
            <span class="nav-link">{{__("words.Users")}}</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('users')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-multiple"></i>
                </span>
                <span class="menu-title">{{__("words.Admin")}} & {{__("words.Users")}}</span>
            </a>
        </li>
        {{-- Orders --}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('orders')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-border-all"></i>
                </span>
                <span class="menu-title">{{__("words.Users")}} {{__("words.Orders")}}</span>
            </a>
        </li>
    </ul>
</nav>
