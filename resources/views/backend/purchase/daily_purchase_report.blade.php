@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daily Purchase Report</h4><br><br>
                            <form method="get" action="{{route('daily.purchase.pdf')}}" target="_blank" id="myForm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="md-3 form-group">
                                            <label for="start_date" class="col-form-label">Start Date</label>
                                            <input type="date" name="start_date" class="form-control example-date-input"
                                                id="start_date" placeholder="YY-MM-DD">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-3 form-group">
                                            <label for="end_date" class="col-form-label">End Date</label>
                                            <input type="date" name="end_date" class="form-control example-date-input"
                                                id="end_date" placeholder="YY-MM-DD">
                                        </div>
                                    </div>

                                    <div class="col-md-4" style="margin-top:auto">
                                        <div class="md-3">
                                            <label for="date" class="col-form-label"></label>
                                            <button type="submit" class="btn btn-info">Search</button>
                                        </div>
                                    </div>
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
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true,
                    },
                },
                message: {
                    start_date: {
                        required: 'Please select start date!',
                    },
                    end_date: {
                        required: 'Please select end date!',
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
