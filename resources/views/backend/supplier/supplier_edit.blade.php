@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Supplier Page</h4><br><br>
                            <form method="post" action="{{route('supplier.update')}}" id="myForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $supplier->id }}">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="form-group col-sm-10">
                                        <input name="name" class="form-control" type="text" id="name"
                                            value="{{ $supplier->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="mobile_no" class="col-sm-2 col-form-label">Mobile Number</label>
                                    <div class="form-group col-sm-10">
                                        <input name="mobile_no" class="form-control" type="number" id="mobile_no"
                                            value="{{ $supplier->mobile_no }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Supplier Email</label>
                                    <div class="form-group col-sm-10">
                                        <input name="email" class="form-control" type="email" id="email"
                                            value="{{ $supplier->email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Supplier Address</label>
                                    <div class="form-group col-sm-10">
                                        <input name="address" class="form-control" type="text" id="address"
                                            value="{{ $supplier->address }}">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Supplier">
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
                    mobile_no: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                },
                message: {
                    name: {
                        required: 'Please enter you name!',
                    },
                    mobile_no: {
                        required: 'Please enter you mobile number!',
                    },
                    email: {
                        required: 'Please enter you email!',
                    },
                    email: {
                        required: 'Please enter you address!',
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
