@extends('layouts.master')
@section('title')

@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->


    <div class="container">
        <div class="alrty alert-success w-75 m-auto text-center p-2" style="font-size:20px; display:none " id="success_alert">
            Success: Success New Admain
        </div>

        <div class="alrty alert-danger w-75 m-auto text-center p-2" style="font-size:20px; display:none " id="error_alert">
            Error : Error In Data
        </div>
        <form id="formData">
            @method('POST')
            @csrf

            <div class="row">

                <div class="col-6">

                    <div class="mb-3">
                        <label for="" class="form-label">* Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" />
                        <p class="text-danger" id="error_email"> </p>


                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">* Name </label>
                        <input type="text" class="form-control" name="name" placeholder="Name" />
                        <p class="text-danger" id="error_name"> </p>


                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-6">

                    <div class="mb-3">
                        <label for="" class="form-label">* Re-Password </label>
                        <input type="password" class="form-control" name="re-password" placeholder="Re-Password" />

                        <p class="text-danger" id="error_re-password"> </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">* Password </label>
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                        <p class="text-danger" id="error_password"> </p>


                    </div>

                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <label for="" class="form-label">Job</label>
                    <select class="form-select form-select-lg" name="status">
                        <option selected>Select one</option>
                        <option value="1">Admin</option>
                        <option value="2">Employee</option>
                    </select>
                    <p class="text-danger" id="error_status"> </p>
                </div>
            </div>

    </div>


    <div class="progress m-auto w-50" style="display: none" id="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
            aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div>

    <div class="text-center">
        <button class="btn btn-outline-primary m-5" id="craete">Create</button>

    </div>



    </form>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

    <script>
        $(document).ajaxStart(function() {
            $('#progress').show();


        });


        $(document).ajaxStop(function() {
            $('#progress').hide();

        });

        $(document).on('click', '#craete', function(e) {
            e.preventDefault();
            var formData = new FormData($('#formData')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('users.store') }}",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.msg == "error") {
                        $('#error_alert').show();
                        $('#success_alert').hide();
                        $('.text-danger').hide();
                        setInterval(() => {
                            $('#error_alert').fadeOut('slow');

                        }, 3000);

                        $.each(data.data, function(key, value) {
                            if (value) {

                                $('#error_' + key).text(value).show();
                            }
                        });


                    }

                    if (data.msg == "success") {
                        $('#error_alert').hide();
                        $('#success_alert').show();
                        $('.text-danger').hide();
                        setInterval(() => {
                            $('#success_alert').fadeOut('slow');

                        }, 3000);
                    }


                },
                error: function(error) {
                    $('#error_alert').show();
                    $('#success_alert').hide();
                    setInterval(() => {
                            $("#error_alert").fadeOut('slow')

                        },
                        3000)

                }
            });



        })
    </script>
@endsection
