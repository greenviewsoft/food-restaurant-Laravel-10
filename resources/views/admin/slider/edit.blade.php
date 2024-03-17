@extends('admin.master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Slider </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Slider</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-4">

                            <form class="row g-3" action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH') 
                                <div class="col-md-6">
                                    <label for="input1" class="form-label">Title </label>
                                    <input type="text" name="title" class="form-control"  value="{{ $slider->title }}" >
                                </div>
                                <div class="col-md-6">
                                    <label for="input1" class="form-label">Sub Title </label>
                                    <input type="text" name="sub_title" class="form-control" value="{{ $slider->sub_title }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="input1" class="form-label">Short Description </label>
                                    <input type="text" name="short_description" class="form-control" value="{{ $slider->short_description }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="input1" class="form-label">Button Link</label>
                                    <input type="text" name="button_link" class="form-control" value="{{ $slider->button_link }}" >
                                </div>
                                <div class="col-md-12">
                                    <label for="input1" class="form-label">Offer %%</label>
                                    <input type="text" name="offer" class="form-control" value="{{ $slider->offer }}" >
                                </div>


                                <div class="col-md-6">
                                    <select name="status" class="form-select mb-3" aria-label="Default select example">
                                        <option selected="">Status</option>
                                        <option value="1" {{ $slider->status==1 ?  'selected' : ''}}>Active</option>
                                        <option value="0" {{ $slider->status==0 ?  'selected' : ''}}>Inactive</option>
                                    </select>

                                         </div>
                                    
                                         <div class="col-md-12">
                                            <label for="input1" class="form-label">Slider Images</label>
                                            <div id="preview_img">
                                              
                                                    <img src="{{ asset('uploads/slider_images/' . $slider->image) }}" class="img-thumbnail" width="100" height="100" alt="Slider Image">
                                              
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input1" class="form-label">Upload New Images</label>
                                            <input type="file" name="image[]" class="form-control" id="image" multiple>
                                            <div class="row" id="preview_img"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                            </div>
                                        </div>
                                        </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------===Show MultiImage ========------->
<script>
    $(document).ready(function() {
        $('#image').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(100)
                                    .height(80); //create image element 
                                $('#preview_img').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
@endsection
