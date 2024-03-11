<nav class="navbar p-0 fixed-top d-flex flex-row {{$color == "light" ? "bg-light" : "bg-dark text-light"}}">
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch {{$color == "light" ? "text-dark" : "text-light"}}">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        @if (session()->has("lang") && session()->get("lang") == "en")
        <ul class="navbar-nav navbar-nav-right">
            @else
        <ul class="navbar-nav navbar-nav-left" style="margin-right: auto;">
        @endif
            {{-- Language Start--}}
            <li class="nav-item mx-5">
                @if (session()->has("lang") && session()->get("lang") == "ar")
                <a href="{{url("lang/en")}}" class="nav-link">{{__("words.English")}}</a>
                @else
                <a href="{{url("lang/ar")}}" class="nav-link lg">{{__("words.Arabic")}}</a>
                @endif
            </li>
            {{-- Language End--}}
            {{-- Light or Dark mode Start--}}
            <div class="form-check form-switch mx-3">
                <form action="{{url("color")}}" method="post">
                    @csrf
                    <input type="text" name="theme" value="{{$color == "light" ? "dark" : "light"}}" hidden>
                    <button type="submit" class="btn btn-sm {{$color == "light" ? "btn-dark" : "btn-light"}}">
                        <i class=" {{$color == "light" ? "mdi mdi-weather-night" : "mdi mdi-weather-sunny"}}"></i>
                    </button>
                </form>
            </div>
                {{-- Light or Dark mode End--}}
            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                    <div class="navbar-profile">
                        <img class="img-xs rounded-circle" src="{{asset('admin/assets')}}/images/faces/face15.jpg" alt="">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name">{{Auth::user()->name}}</p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}"
                    aria-labelledby="profileDropdown">
                    <x-dropdown-link :href="route('profile.edit')" class="m-2 text-center nav-link">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" class="m-2 text-center">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="nav-link"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    {{-- </a> --}}
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>
