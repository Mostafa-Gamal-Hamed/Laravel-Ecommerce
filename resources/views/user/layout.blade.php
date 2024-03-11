{{-- Header Start --}}
@include("user.inc.header")
{{-- Header End --}}

{{-- Navbar Start --}}
@include('user.inc.navbar')
{{-- Navbar End --}}

{{-- Body Start --}}
@yield("body")
{{-- Body End --}}

{{-- Footer Start --}}
    @include('user.inc.footer')
{{-- Footer End --}}
