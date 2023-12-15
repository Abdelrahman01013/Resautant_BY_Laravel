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
    <div class="alrty alert-success w-75 m-auto text-center p-2" style="font-size:20px; display:none " id="success_alert">
        Success: Success New Meal
    </div>

    <div class="alrty alert-danger w-75 m-auto text-center p-2" style="font-size:20px; display:none " id="error_alert">
        Error : Error In Data
    </div>
    <!-- row -->
    <div class="text-center ">
        <form id="formData">
            @csrf
            @method('POST')


            <label for="gallery" class="mt-5">


                <span class="material-symbols-outlined" style="font-size: 100px">
                    add_a_photo
                </span>
                <h3>Upload Photo *</h3>



            </label>
            <input type="file" name="gallery" id="gallery" hidden>
            <p class="text-danger" id="error_gallery"> </p>


            <br>
            <br>
            <div class="progress m-auto w-50" style="display: none" id="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>

            <br>
            <button class="btn btn-outline-primary" id="craete">Create New Event </button>

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
                url: "{{ route('galleries.store') }}",
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



        });
    </script>




@endsection
