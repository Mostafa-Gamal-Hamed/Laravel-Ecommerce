@extends("admin.layout")

@section("body")
<div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeIn animate__slow">
    <h2 class="text-center">{{$user->name}}</h2><hr>
    @include("success")
    <div class="row">
        {{-- Send Email --}}
        <div class="col border-end">
            <h3 class="text-center">{{__("words.Send Email")}}</h3>
            <form action="{{url("email")}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input name="name" type="text"
                        class="form-control text-dark bg-light mb-2" value="{{$user->name}}">
                        @error("name")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input name="email" type="text"
                        class="form-control text-dark bg-light mb-2" value="{{$user->email}}">
                        @error("email")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input name="subject" type="text"
                        class="form-control text-dark bg-light mb-2" placeholder="Subject">
                    @error("subject")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="col-lg-12">
                        <textarea name="body" rows="6" class="form-control text-dark bg-light mb-2"
                        placeholder="Message"></textarea>
                    @error("body")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success">{{__("words.Send")}}</button>
                    </div>
                </div>
            </form>
        </div>
        {{-- Send SMS --}}
        <div class="col">
            <h3 class="text-center">{{__("words.Send SMS")}}</h3>
            <form action="{{url("sms")}}" method="get">
                <input type="text" name="name" class="form-control mb-2 text-dark bg-light" value="{{$user->name}}" min="3">
                <input type="number" name="phone" class="form-control mb-2 text-dark bg-light" value="0{{$user->phone}}" min="10">
                <textarea name="message" rows="6" class="form-control mb-2 text-dark bg-light" id="message" placeholder="Your Message"></textarea>
                <button type="submit" class="btn btn-success px-md-5">{{__("words.Send")}}</button>
            </form>
        </div>
    </div>
</div>
@endsection