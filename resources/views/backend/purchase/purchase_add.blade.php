@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Purchase Page</h4><br><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="date" class="col-form-label">Date</label>
                                        <input type="date" name="date" class="form-control example-date-input"
                                            id="date">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="purchase_no" class="col-form-label">Purchase No</label>
                                        <input type="text" name="purchase_no" class="form-control" id="purchase_no">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="supplier_id" class="col-form-label">Supplier</label>
                                        <select name="supplier_id" id="supplier_id" class="form-select"
                                            aria-label="Default select example">
                                            <option selected="">Select Supplier</option>
                                            @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="category_id" class="col-form-label">Category</label>
                                        <select name="category_id" class="form-select" id="category_id"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="product_id" class="col-form-label">Product</label>
                                        <select name="product_id" class="form-select" id="product_id"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="" class="col-form-label mt-5"></label>
                                        <input type="submit" class="btn btn-secondary btn-rounded waves-effect waves-light"
                                            value="Add More" name="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- card-body-end --}}

                        <div class="card-body">
                            <form action="" method="">
                                @csrf

                                <table class="tabel-sm table-bordered" width="100%" style="border-color:#ddd;">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product</th>
                                            <th>Pcs/Kg</th>
                                            <th>Unit Price</th>
                                            <th>Description</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="addRow" class="addRow">

                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td>
                                                <input type="text" name="estimated_ammount" value="0" id="estimated_ammount" class="form-control estimated_ammountt" readonly style="background-color:#ddd">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" id="storeButton" >Store Purchase</button>
                                </div>
                            </form>
                        </div>

                        {{-- card-body-end --}}
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#supplier_id', function() {
                var supplier_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-category') }}",
                    type: "GET",
                    data: {
                        supplier_id: supplier_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Category</option>';
                        $.each(data, function(key, v) {
                            html += '<option value=" ' + v.category_id + ' ">' + v
                                .category.name + ' </option>'
                        });
                        $('#category_id').html(html);
                    }
                })
            })
        })
    </script>

    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product') }}",
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Product</option>';
                        $.each(data, function(key, v) {
                            html += '<option value=" ' + v.id + ' ">' + v.name +
                                ' </option>'
                        });
                        $('#product_id').html(html);
                    }
                })
            })
        })
    </script>
@endsection
