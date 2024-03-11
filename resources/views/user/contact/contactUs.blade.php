@extends("user.layout")

@section("title")
Contact Us
@endsection

@section("body")

    <div class="page-heading contact-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content animate__animated animate__fadeInLeft animate__slow">
                        <h4>{{__("words.Contact Us")}}</h4>
                        <h2>{{__("words.let’s get in touch")}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="find-us">
        <div class="container">
            @include("success")
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>{{__("words.Our Location on Maps")}}</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6907.205144600351!2d31.23511246278528!3d30.048257714349877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1702810548922!5m2!1sar!2seg"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="left-content">
                        <h4>{{__("words.About our office")}}</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur
                            similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et,
                            consequuntur, modi mollitia corporis ipsa voluptate corrupti.</p>
                        <ul class="social-icons">
                            <li><a href="https://www.facebook.com/mustafa.gamal.319"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/mustafa-hamed-89b834252"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="send-message">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>{{__("words.Send us a Message")}}</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="{{url("contact")}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                                    @error("name")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    @error("email")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="subject" class="form-control" placeholder="subject">
                                    @error("subject")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="body" class="form-control" placeholder="Your Message"></textarea>
                                    @error("body")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
