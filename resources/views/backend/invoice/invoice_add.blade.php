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
                                        <input type="text" readonly style="background-color:#ddd" value="{{ $invoice_no }}" name="invoice_no"
                                            class="form-control" id="invoice_no">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="date" class="col-form-label">Date</label>
                                        <input type="date" value="{{ $date }}" name="date" class="form-control example-date-input"
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
                                            name="current_stock_qty" class="form-control" id="current_stock_qty">
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
                                            <th width="10%">Category</th>
                                            <th width="15%">Product</th>
                                            <th width="7%">Pcs/Kg</th>
                                            <th width="7%">Unit Price</th>
                                            <th width="7%">Total Price</th>
                                            <th width="7%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="addRow" class="addRow">

                                    </tbody>
                                    <tbody>
                                         <tr>
                                            <td colspan="4">Discount</td>
                                            <td>
                                                <input type="text" name="discount_amount" id="discount_amount" class="form-control discount_amount" placeholder="Discount amount">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"> Grand Total</td>
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

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <textarea name="description" class="form-control" id="description" placeholder="Write Description Here..."></textarea><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" id="storeButton">Store Invoice</button>
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
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="invoice_no" value="@{{purchase_no}}">

        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{ category_name }}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{ product_name }}
        </td>
        <td>
            <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]" value="">
        </td>
        <td>
            <input type="number" min="1" class="form-control unit_price text-right" name="unit_price[]" value="">
        </td>
        <td>
            <input type="number" class="form-control selling_price text-right" name="selling_price[]" value="0" readonly>
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
                var invoice_no = $('#invoice_no').val();
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
                    invoice_no: invoice_no,
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
            $(document).on('keyup click', '.selling_qty,.unit_price', function() {
                var unit_price = $(this).closest('tr').find('input.unit_price').val();
                var qty = $(this).closest('tr').find('input.selling_qty').val();

                var total = unit_price * qty;
                $(this).closest('tr').find('input.selling_price').val(total);
                $('#discount_amount').trigger('keyup');
            });
            $(document).on('keyup','#discount_amount',function(){
                totalAmountPrice();
            });
            // calculate sum ammount in invoice

            function totalAmountPrice() {
                var sum = 0;
                $('.selling_price').each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });
                var discount_amount = parseFloat($('#discount_amount').val());
                if (!isNaN(discount_amount) && discount_amount.length != 0) {
                        sum -= parseFloat(discount_amount);
                    }
                $('#estimated_ammount').val(sum);
            }
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product') }}",
                    type: "GET",
                    data: {
                        category_id: category_id,
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

    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#product_id', function() {
                var product_id = $(this).val();
                $.ajax({
                    url: "{{ route('check-product-stock') }}",
                    type: "GET",
                    data: {
                        product_id: product_id,
                    },
                    success: function(data) {
                        $('#current_stock_qty').val(data);
                    }
                })
            })
        })
    </script>
@endsection
