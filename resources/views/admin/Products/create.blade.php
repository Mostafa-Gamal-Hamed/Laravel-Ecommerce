@extends("admin.layout")

@section("body")

    <h2 class="card-title text-center mb-3 {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeInRight animate__slow">{{__("words.Create Product")}}</h2>
    @include('success')
    <div class="row {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeInRight animate__slow">
        <form method="post" action="{{route('createProduct')}}" enctype="multipart/form-data" class="col-8">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Product Name")}}</label>
                <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('name')}}" placeholder="Enter name">
                @error("name")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Description")}}</label>
                <textarea type="text" name="description" class="form-control text-white" style="height: 150px;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc">{{old('description')}}</textarea>
                @error("description")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col" for="exampleInputEmail1">{{__("words.Small description")}}</label> <span class="col text-end" style="color:#cac6c6d1;">255 {{__("words.Letters only")}}</span>
                </div>
                <textarea type="text" name="smallDesc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc" maxlength="255">{{old('smallDesc')}}</textarea>
                @error("smallDesc")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Price")}}</label>
                <input type="number" name="price" class="form-control text-white" value="{{old('price')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
                @error("price")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col" for="exampleInputEmail1">{{__("words.Offer Price")}}</label> <span class="col text-end" style="color:#cac6c6d1;">{{__("words.option")}}</span>
                </div>
                <input type="number" name="offerPrice" value="0" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
                @error("offerPrice")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Quantity")}}</label>
                <input type="text" name="quantity" class="form-control text-white" value="{{old('quantity')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
                @error("quantity")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <select class="form-select bg-black text-light" name="category_id" aria-label="Default select example">
                <option hidden>{{__("words.Select Category")}}</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{__("words.$category->name")}} <span>({{$category->category->name}})</span></option>
                @endforeach
                @error("category_id")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </select><br>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Image")}} 1</label>
                <input type="file" name="image1" id="fileInput_1" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter image">
                @error("image1")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Image")}} 2</label>
                <input type="file" name="image2" id="fileInput_2" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter image">
                @error("image2")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Image")}} 3</label>
                <input type="file" name="image3" id="fileInput_3" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter image">
                @error("image3")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{__("words.Submit")}}</button>
        </form>
        <div class="col-4 text-center">
            <h2>{{__("words.Image")}}</h2>
            <img src="" id="imagePreview_1" style="max-height:250px;max-width:300px;" class="img-fluid rounded" alt="{{__("words.No Image")}}">
            <br>
            <img src="" id="imagePreview_2" style="max-height:250px;max-width:300px;" class="img-fluid rounded" alt="{{__("words.No Image")}}">
            <br>
            <img src="" id="imagePreview_3" style="max-height:250px;max-width:300px;" class="img-fluid rounded" alt="{{__("words.No Image")}}">
        </div>
    </div>

@endsection

{{-- Show The Image --}}
<script src="{{asset("Admin/assets")}}/js/jqueryMin.js"></script>
<script>
    $(document).ready(function() {
        // Image 1
        $("#fileInput_1").on("change", function(event) {
            var fileInput = event.target;
            var file = fileInput.files[0];

            if (file) {
            var reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onload = function() {
                var dataURL = reader.result;

                $("#imagePreview_1").attr("src", dataURL);
                $("#imagePreview_1").css("display", "block");
            };
            } else {
            $("#imagePreview_1").attr("src", "");
            $("#imagePreview_1").css("display", "none");
            }
        })

        // Image 2
        $("#fileInput_2").on("change", function(event) {
            var fileInput = event.target;
            var file = fileInput.files[0];

            if (file) {
            var reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onload = function() {
                var dataURL = reader.result;

                $("#imagePreview_2").attr("src", dataURL);
                $("#imagePreview_2").css("display", "block");
            };
            } else {
            $("#imagePreview_2").attr("src", "");
            $("#imagePreview_2").css("display", "none");
            }
        })

        // Image 3
        $("#fileInput_3").on("change", function(event) {
            var fileInput = event.target;
            var file = fileInput.files[0];

            if (file) {
            var reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onload = function() {
                var dataURL = reader.result;

                $("#imagePreview_3").attr("src", dataURL);
                $("#imagePreview_3").css("display", "block");
            };
            } else {
            $("#imagePreview_3").attr("src", "");
            $("#imagePreview_3").css("display", "none");
            }
        })
    });
</script>
