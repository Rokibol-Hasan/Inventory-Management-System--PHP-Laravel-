@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Product Quality Check</h4><br><br>
                                <form method="post" action="{{ route('upload.image') }}" id="myForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="image" class="col-sm-2 col-form-label">Product Image
                                        </label>
                                        <div class="col-sm-10">
                                            <input name="product_image" class="form-control" type="file" id="image">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                        <div class="col-sm-10">
                                            <img id="showImage" class="rounded avatar-lg"
                                                src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-info waves-effect waves-light"
                                        value="Check Status">
                                </form>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img src="{{ asset($image->product_image) }}">
                                        <div class="mt-3">
                                            <span class="" style="background-color:rgb(251, 244, 147); border-radius:5px; padding:10px 5px;"> {{ Str::contains($image, 'fresh') ? 'This product is fresh' : 'This product affected by:--- deases ' }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>



            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#myForm').validate({
                    rules: {
                        product_image: {
                            required: true,
                        },
                    },
                    message: {
                        product_image: {
                            required: 'Image is required!',
                        },
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('.invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('.is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                });
            });
        </script>
    @endsection
