@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Supplier And Product Wise  Report</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="text-center col-md-12">
                                    <strong>Supplier Wise Report</strong>
                                    <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value">&nbsp;&nbsp;

                                    <strong>Product Wise Report</strong>
                                    <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value">
                                </div>
                            </div>
                            {{-- end row --}}
                            <br>
                            <div class="show_supplier" style="display: none;">
                                <form method="get" action="{{route('supplier.wise.pdf')}}" id="myForm" target="_blank">
                                    <div class="row">
                                        <div class="col-sm-8 form-group">
                                             <select name="supplier_id" class="form-select select2" aria-label="Default select example">
                                            <option value="">Select Supplier</option>
                                            @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>

                                        <div class="col-sm-4" style="margin: auto;">
                                            <button type="submit" class="btn btn-primary"> Search </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    supplier_id: {
                        required: true,
                    },
                },
                message: {
                    supplier_id: {
                        required: 'Please enter supplier!',
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
        $(document).on('change', '.search_value', function() {
            var search_value = $(this).val();
            if (search_value == 'supplier_wise') {
                $('.show_supplier').show();
            } else {
                $('.show_supplier').hide();
            }
        });
    </script>
@endsection
