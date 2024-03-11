<header class="fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="d-flex align-items-center justify-content-center w-100 px-2">
            @auth
                <a class="navbar-brand animate__animated animate__fadeInLeft animate__slow" href="{{ url('home') }}">
                    <h2>RESTING <em>CLOTHES</em></h2>
                </a>
            @endauth
            @guest
                <a class="navbar-brand animate__animated animate__fadeInLeft animate__slow" href="{{ url('/') }}">
                    <h2>RESTING <em>CLOTHES</em></h2>
                </a>
            @endguest
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse animate__animated animate__fadeInRight animate__slow" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('home') }}">{{__("words.Home")}}
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{__("words.Home")}}
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    @endguest
                    {{-- All products start --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products') }}">
                            {{__("words.Products")}}
                        </a>
                    </li>
                    {{-- All products end --}}
                    {{-- Men start --}}
                    <div class="position-relative mx-2">
                        <a class="nav-link" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__("words.Men")}}
                        </a>
                        <ul class="dropdown-menu bg-light">
                            <li>
                                <a class="nav-link text-danger text-center" href="{{ url('categories/1') }}">{{__("words.All Categories")}}</a>
                            </li>
                            @foreach (App\Models\CategoryChild::where("category_id",1)->get() as $men)
                                <li>
                                    <a href="{{url("showCategory/$men->id")}}" class="nav-link text-danger text-center">{{__("words.$men->name")}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Men End --}}
                    {{-- Women start --}}
                    <div class="position-relative mx-2">
                        <a class="nav-link" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__("words.Women")}}
                        </a>
                        <ul class="dropdown-menu bg-light">
                            <li>
                                <a class="nav-link text-danger text-center" href="{{ url('categories/2') }}">{{__("words.All Categories")}}</a>
                            </li>
                            @foreach (App\Models\CategoryChild::where("category_id",2)->get() as $women)
                                <li>
                                    <a href="{{url("showCategory/$women->id")}}" class="nav-link text-danger text-center">{{__("words.$women->name")}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Women End --}}
                    {{-- Kids start --}}
                    <div class="position-relative mx-2">
                        <a class="nav-link" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__("words.Kids")}}
                        </a>
                        <ul class="dropdown-menu bg-light">
                            <li>
                                <a class="nav-link text-danger text-center" href="{{ url('categories/3') }}">{{__("words.All Categories")}}</a>
                            </li>
                            @foreach (App\Models\CategoryChild::where("category_id",3)->get() as $kid)
                                <li>
                                    <a href="{{url("showCategory/$kid->id")}}" class="nav-link text-danger text-center">{{__("words.$kid->name")}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Kids End --}}
                    {{-- Baby start --}}
                    <div class="position-relative mx-2">
                        <a class="nav-link" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__("words.Baby")}}
                        </a>
                        <ul class="dropdown-menu bg-light">
                            <li>
                                <a class="nav-link text-danger text-center" href="{{ url('categories/4') }}">{{__("words.All Categories")}}</a>
                            </li>
                            @foreach (App\Models\CategoryChild::where("category_id",4)->get() as $baby)
                                <li>
                                    <a href="{{url("showCategory/$baby->id")}}" class="nav-link text-danger text-center">{{__("words.$baby->name")}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Baby End --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contactUs') }}">{{__("words.Contact Us")}}</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">{{__("words.My Profile")}}</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" class="nav-link"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">{{__("words.Log In")}}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">{{__("words.Register")}}</a>
                                </li>
                            @endif
                        @endauth
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{url("cart")}}"style="font-size: 18px;">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            @if (Auth::user())
                                @if (App\Models\Cart::where("user_id",Auth::user()->id)->count() != 0)
                                    <span>{{App\Models\Cart::where("user_id",Auth::user()->id)->count()}}</span>
                                @endif
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="progress-container" id="progress-container">
    <div class="progress-bar" id="progressBar"></div>
</div>