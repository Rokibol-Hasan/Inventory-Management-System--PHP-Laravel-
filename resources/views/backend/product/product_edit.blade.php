@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Product Page</h4><br><br>
                            <form method="post" action="{{ route('product.update') }}" id="myForm"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="form-group col-sm-10">
                                        <input name="name" class="form-control" type="text" id="name" value="{{$product->name}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="col-sm-10">
                                        <select name="supplier_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $product->supplier_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Unit Name</label>
                                    <div class="col-sm-10">
                                        <select name="unit_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($unit as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $product->unit_id ? 'selected' : ''}} >{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" class="form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Product">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    supplier_id: {
                        required: true,
                    },
                    unit_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                },
                message: {
                    name: {
                        required: 'Please enter product name!',
                    },
                    supplier_id: {
                        required: 'Please enter supplier!',
                    },
                    unit_id: {
                        required: 'Please enter unit!',
                    },
                    category_id: {
                        required: 'Please enter category!',
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
@endsection
