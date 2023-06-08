@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Invoice Page</h4><br><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="purchase_no" class="col-form-label">Invoice No</label>
                                        <input type="text" readonly style="background-color:#ddd" name="invoice_no"
                                            class="form-control" id="invoice_no">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="date" class="col-form-label">Date</label>
                                        <input type="date" name="date" class="form-control example-date-input"
                                            id="date">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="category_id" class="col-form-label">Category</label>
                                        <select name="category_id" class="form-select select2" id="category_id"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="product_id" class="col-form-label">Product</label>
                                        <select name="product_id" class="form-select select2 -bottom-3" id="product_id"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="purchase_no" class="col-form-label">Stock(PCS/KG)</label>
                                        <input type="text" readonly style="background-color:#ddd"
                                            name="current_stock_qty" class="form-control" id="invoice_no">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="" class="col-form-label mt-5"></label>
                                        <i
                                            class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">
                                            Add More </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- card-body-end --}}

                        <div class="card-body">
                            <form action="{{ route('purchase.store') }}" method="POST">
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
                                                <input type="text" name="estimated_ammount" value="0"
                                                    id="estimated_ammount" class="form-control estimated_ammountt" readonly
                                                    style="background-color:#ddd">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" id="storeButton">Store Purchase</button>
                                </div>
                            </form>
                        </div>

                        {{-- card-body-end --}}
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>

    <script type="text/x-handlebars-template" id="document-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
        <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">

        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{ category_name }}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{ product_name }}
        </td>
        <td>
            <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value="">
        </td>
        <td>
            <input type="number" min="1" class="form-control unit_price text-right" name="unit_price[]" value="">
        </td>
        <td>
            <input type="text" class="form-control" name="description[]" value="">
        </td>
        <td>
            <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly>
        </td>
        <td>
            <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
        </td>
    </tr>
 </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", ".addeventmore", function() {
                var date = $('#date').val();
                var purchase_no = $('#purchase_no').val();
                var supplier_id = $('#supplier_id').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();

                if (date == '') {
                    $.notify("Date is required!", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (purchase_no == '') {
                    $.notify("Purchase number is required!", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (supplier_id == '') {
                    $.notify("Supplier name is required!", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (category_id == '') {
                    $.notify("Category name is required!", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (product_id == '') {
                    $.notify("Product name is required!", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }


                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var data = {
                    date: date,
                    purchase_no: purchase_no,
                    supplier_id: supplier_id,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name
                };
                var html = template(data);
                $('#addRow').append(html);

            });
            $(document).on("click", ".removeeventmore", function(e) {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });
            $(document).on('keyup click', '.buying_qty,.unit_price', function() {
                var unit_price = $(this).closest('tr').find('input.unit_price').val();
                var buying_qty = $(this).closest('tr').find('input.buying_qty').val();

                var total = unit_price * buying_qty;
                $(this).closest('tr').find('input.buying_price').val(total);
                totalAmountPrice();
            });
            // calculate sum ammount in invoice

            function totalAmountPrice() {
                var sum = 0;
                $('.buying_price').each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });
                $('#estimated_ammount').val(sum);
            }
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                // var supplier_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product') }}",
                    type: "GET",
                    data: {
                        category_id: category_id,
                        // supplier_id: supplier_id
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
