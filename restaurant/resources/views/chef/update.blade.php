@extends('layouts.master')
@section('title')
    Create Chef
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Chef</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="alert alert-success text-center" id="alert_success" style="display: none ;font-size: 30px">
        Success: Update Success
    </div>
    <div class="alert alert-danger" id="alert_error" style="display: none;font-size: 50px">
        Erorr: Error In Data
    </div>
    <input type="text" id="product_id" product_id="{{ $chef->id }}" hidden>
    <form id="formData">

        @csrf
        @method('PUT')

        <!-- row -->
        <div class="container">
            <div class="row m-5">
                <div class="col-6">
                    <div class="container">
                        <label>job</label>
                        <input class="form-control form-control-lg" type="text" placeholder="JOB"
                            aria-label=".form-control-lg example" name="job" value="{{ $chef->job }}">
                        <p class="text-danger" id="error_job"></p>
                    </div>

                </div>
                <div class="col-6">
                    <label>name</label>
                    <div class="container">
                        <input class="form-control form-control-lg" type="text" placeholder="NAME"
                            aria-label=".form-control-lg example" name="name" value="{{ $chef->name }}" autofocus>
                        <p class="text-danger" id="error_name"> </p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="mb-3 text-center">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5">{{ $chef->description }}</textarea>
                        <p class="text-danger" id="error_description"> </p>
                    </div>
                </div>
            </div>

            <div class="row m-5">
                <div class="col-12 text-center">
                    <label for="photo">
                        <span class="material-symbols-outlined" style="font-size: 100px">
                            add_a_photo
                        </span>
                        <br>
                        Change Image
                    </label>
                    <input type="file" name="photo" hidden id="photo">
                    <p class="text-danger" id="error_photo"> </p>
                </div>
            </div>

            <!-- row closed -->
        </div>

        <div class="text-center m-5" id="loading" style="display:none">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>


        <div class="text-center">
            <button class="btn btn-outline-primary" id="submit">Update</button>
        </div>

    </form>
    </div>
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

    <script>
        $(document).ajaxStart(function() {
            $('#loading').show();
        });

        $(document).ajaxStop(function() {
            $('#loading').hide();

        })
    </script>


    <script>
        $(document).on('click', '#submit', function(e) {
            e.preventDefault();
            var formData = new FormData($('#formData')[0]);
            var id = $('#product_id').attr('product_id');

            $.ajax({
                type: 'POST',
                enctype: "multipart/form-data",
                url: "{{ route('chef.update', '') }}" + "/" + id,
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if (data.msg == "error") {

                        $.each(data.data, function(key, value) {
                            $('#error_' + key).text(value);

                        });


                    }

                    if (data.msg == 'success') {
                        $('#alert_success').show();
                        $('#alert_erroe').hide();
                        $('#error_photo').empty();
                        setInterval(() => {
                            $('#alert_success').fadeOut('slow');
                        }, 3000);

                    }

                },
                error: function(error) {
                    if (error) {
                        $('#alert_success').hide();
                        $('#alert_erroe').show();
                        $('#error_photo').empty();
                        var errors = error.responseJSON.data;
                        $.each(errors, function(key, value) {
                            $('#error_' + key).text(value);
                        });
                    }
                }
            });
        });
    </script>
@endsection
