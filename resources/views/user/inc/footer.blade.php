{{-- Change moving bar from right to left --}}
@if (session()->get("lang")  == "ar")
    <style>
        @keyframes moveText {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(100%);
            }
        }
    </style>
@else
    <style>
        @keyframes moveText {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(-100%);
            }
        }
    </style>
@endif

<div class="bar">
    <div class="move-bar" id="movingBar">
        <span>
            <a href="{{url("register")}}">{{__("words.Join Us to fetch all new Fashion")}}.</a>
                {{__("words.Where fashion meets innovation in RESTING CLOTHES, you will find everything new and modern in all shapes and sizes.")}}.
        </span>
    </div>
</div>

<footer>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="inner-content">
                <p>Copyright &copy; 2023. - Design: <span class="text-danger">Mostafa Gamal</span></p>
            </div>
        </div>
        {{-- Language Start--}}
        <div class="col-md-4">
            <div class="inner-content">
                @if (session()->has("lang") && session()->get("lang") == "ar")
                <a href="{{url("lang/en")}}" class="nav-link lg text-dark">
                    <img src="{{asset('assets/images/us.svg')}}" class="rounded" alt="US Flag" width="20">
                    English
                </a>
                @else
                <a href="{{url("lang/ar")}}" class="nav-link lg text-dark">
                    <img src="{{asset('assets/images/eg.svg')}}" class="rounded" alt="US Flag" width="20">
                    Arabic
                </a>
                @endif
            </div>
        </div>
        {{-- Language End--}}
    </div>
</footer>


<!-- Bootstrap core JavaScript -->
<script src="{{asset("vendor")}}/jquery/jquery.min.js"></script>
<script src="{{asset("vendor")}}/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="{{asset("assets")}}/js/bootstrap.js"></script>
<script src="{{asset("assets")}}/js/custom.js"></script>
<script src="{{asset("assets")}}/js/owl.js"></script>
<script src="{{asset("assets")}}/js/slick.js"></script>
<script src="{{asset("assets")}}/js/isotope.js"></script>
<script src="{{asset("assets")}}/js/accordions.js"></script>
<script src="{{asset("assets")}}/js/stal.js"></script>


<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0;
    function clearField(t) {
        if (!cleared[t.id]) {
            cleared[t.id] = 1;
            t.value = '';
            t.style.color = '#fff';
        }
    }
</script>

</body>

</html>
