@extends("admin.layout")

@section("body")

    <h2 class="text-center m-3 animate__animated animate__fadeIn animate__slow">{{__("words.Edit Product")}}</h2>
    <form action="{{url("adminUpdateProduct/$product->id")}}" method="post" enctype="multipart/form-data" class="animate__animated animate__fadeIn animate__slow">
        @csrf
        @method("PUT")
        @include("success")
        <div class="form-group">
            <label for="exampleInputEmail1">{{__("words.Name")}}</label>
                <input type="text" name="name" value="{{$product->name}}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error("name")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Description")}}</label>
                <textarea type="text" name="description" class="form-control text-white" style="min-height: 100px;"
                id="exampleInputEmail1" aria-describedby="emailHelp">{{$product->description}}</textarea>
                @error("description")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col" for="exampleInputEmail1">{{__("words.Small description")}}</label> <span class="col text-end" style="color:#cac6c6d1;">255 {{__("words.Letters only")}}</span>
                </div>
                <textarea type="text" name="smallDesc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc" maxlength="255">{{$product->smallDesc}}</textarea>
                @error("smallDesc")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Price")}}</label>
                <input type="number" name="price" value="{{$product->price}}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error("price")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col" for="exampleInputEmail1">{{__("words.Offer Price")}}</label> <span class="col text-end" style="color:#cac6c6d1;">{{__("words.option")}}</span>
                </div>
                <input type="number" name="offerPrice" value="{{$product->offerPrice}}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
                @error("offerPrice")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Quantity")}}</label>
                <input type="text" name="quantity"  value="{{$product->quantity}}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error("quantity")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <select class="form-select bg-black text-light" name="category_id" aria-label="Default select example">
                <option selected value="{{$product->category_id}}">{{__("words.{$product->categoryChild->name}")}}</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{__("words.$category->name")}}</option>
                @endforeach
                @error("category_id")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </select><br>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Image")}}</label>
                <input type="file" name="image1" id="fileInput_1" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error("image1")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Image")}}</label>
                <input type="file" name="image2" id="fileInput_2" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error("image2")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__("words.Image")}}</label>
                <input type="file" name="image3" id="fileInput_3" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error("image3")
                    <span class="text-danger"><i class="mdi mdi-close"></i> {{$message}}</span>
                @enderror
            </div>

            <label for="exampleInputEmail1">{{__("words.Old Images")}}:</label>
            <div class="form-group d-flex justify-content-start">
                <img src="{{asset("storage/$product->image1")}}" id="imagePreview_1" style="height:100px;width:100px;" class="img-fluid rounded" alt="{{__("words.No Image")}}">
                <img src="{{asset("storage/$product->image2")}}" id="imagePreview_2" style="height:100px;width:100px;" class="img-fluid rounded mx-3" alt="{{__("words.No Image")}}">
                <img src="{{asset("storage/$product->image3")}}" id="imagePreview_3" style="height:100px;width:100px;" class="img-fluid rounded" alt="{{__("words.No Image")}}">
            </div>

            <button type="submit" class="btn btn-primary w-25">{{__("words.Update")}}</button>
    </form>

@endsection

{{-- Show The Image --}}
<script src="{{asset("Admin/assets")}}/js/jqueryMin.js"></script>
<script>
    $(document).ready(function() {
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
        });

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
        });

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
        });
    });
</script>