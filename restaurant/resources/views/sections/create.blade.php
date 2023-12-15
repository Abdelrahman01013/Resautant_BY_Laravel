@extends('layouts.master')
@section('title')
    Daily Meals
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Daily Meals</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ New
                    Daily Meals</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="container">
        <div class="container text-center">
            <div class="alert alert-success" id="alert_success" style="display:none ;font-size:50px+"> Success:Create New
                Section
            </div>
            <div class="alert alert-danger" id="alert_error" style="display:none ;font-size:50px+">
                Error In Data
            </div>
            <form id="formData">
                @csrf
                @method('POST')

                <div class="text-center ">

                    <input class="form-control form-control-lg mt-5" type="text" placeholder="New Daily Meals"
                        name="name" id="name">
                </div>


                <p class="text-danger" id="error_name"> </p>
                <br>

                <div class="text-center" id="procces" style="display: none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden"></span>
                    </div>

                </div>
                <button class="btn btn-outline-primary m-5" id="create">Create New</button>
            </form>


        </div>
    </div>
    <!-- Container closed -->
    </div>
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

    <script>
        $(document).ajaxStart(function() {

            $("#procces").show();
        });

        $(document).ajaxStop(function() {

            $("#procces").hide();
        });




        $(document).on('click', '#create', function(e) {
            e.preventDefault();
            var formData = new FormData($('#formData')[0]);

            $.ajax({
                type: "POST",
                url: "{{ route('sections.store') }}",
                data: formData,
                processData: false,


                contentType: false,

                cache: false,
                success: function(data) {
                    if (data.msg == "error") {
                        if (data.data.name) {
                            $('.text-danger').show();
                            $('#error_name').text(data.data.name);

                        }

                        $('#alert_success').hide();
                        $('#alert_error').show();
                        setInterval(() => {
                            $('#alert_error').fadeOut('slow');


                        }, 4000);

                    }
                    if (data.msg == "success") {
                        $('#alert_success').show();
                        $('#alert_error').hide();
                        $('.text-danger').hide();

                        setInterval(() => {
                            $('#alert_success').fadeOut('slow');


                        }, 4000);
                    }
                },
                error: function(error) {
                    $('#alert_success').hide();
                    $('#alert_error').show();
                    setInterval(() => {
                        $('#alert_error').fadeOut('slow');


                    }, 4000);
                },

            })


        })
    </script>

@endsection
