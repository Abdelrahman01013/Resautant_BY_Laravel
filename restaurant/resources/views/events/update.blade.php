@extends('layouts.master')
@section('title')
    Update Events

@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Events</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Update
                    Event</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="alert alert-success text-center" id="success_alert" style="font-size: 25px ;display: none">
        Success: Success Update<br>
        {{ $event->title }}
    </div>
    <div class="alert alert-danger text-center" id="error_alert" style="font-size: 25px ;display: none">
        Error : Error In Data
    </div>
    <!-- row -->
    <div class="container">
        <form id="formData">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-6">
                    <label>* Event Title</label>
                    <input type="text" class="form-control" placeholder="Event Title" name="title"
                        value="{{ $event->title }}">
                    <p class="text-danger" id="error_title"> </p>
                </div>
                <div class="col-6">
                    <label> * Price </label>
                    <input type="text" class="form-control" placeholder=" $ " name="price" value="{{ $event->price }}">
                    <p class="text-danger" id="error_price"> </p>
                </div>

            </div>

            <div class="row">

                <div class="col-12 text-center m-3">
                    <label> * Event Description </label>
                    <br>

                    <textarea name="description" cols="100" rows="3" style="font-size: 20px">{{ $event->description }}</textarea>
                    <p class="text-danger" id="error_description"> </p>
                </div>
            </div>

            <div class="row">
                <input type="file" name="photo" hidden id="photo">
                <div class="col-12 text-center">
                    <label for="photo">
                        <span class="material-symbols-outlined" style="font-size: 50px">
                            add_a_photo
                        </span>
                        <h3>Upload Photo *</h3>
                    </label>
                    <p class="text-danger" id="error_photo"> </p>

                </div>
            </div>
            <div class="text-center">
                <div class="progress m-auto w-50" style="display: none" id="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
                <button class="btn btn-outline-primary m-5" id="update" product_id="{{ $event->id }}"> Update
                </button>
            </div>
        </form>

        <!-- row closed -->
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

        $(document).on('click', '#update', function(e) {
            e.preventDefault();
            var formData = new FormData($('#formData')[0]);
            var id = $(this).attr('product_id');

            $.ajax({
                type: "POST",
                url: "{{ route('events.update', '') }}" + "/" + id,
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
                        $('#success_alert').text("Success Update : " + data.name);
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
