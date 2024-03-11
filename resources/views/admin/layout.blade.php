{{-- Header Start --}}
@include('admin.inc.header')
{{-- Header End --}}
    <div class="container-scroller">

        {{-- SideBar Start --}}
        @include('admin.inc.sidebar')
        {{-- SideBar End --}}

        <div class="container-fluid page-body-wrapper">
            {{-- NavBar Start --}}
            @include('admin.inc.navbar')
            {{-- NavBar End --}}

            {{-- Body Start --}}
            <div class="main-panel">
                <div class="content-wrapper {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}}">
                    @yield('body')
                </div>
            </div>
            {{-- Body Start --}}
        </div>

    </div>
{{-- Footer Start --}}
@include('admin.inc.footer')
{{-- Footer End --}}
