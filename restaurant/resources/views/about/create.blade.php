@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">HOME</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ update</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->



    <div class="container margin: auto">
        <form id="formData">
            @csrf
            <h1 class="text-left"> HEADER </h1>
            <div class="form-group w-75" style="margin: auto">
                <label for="formGroupExampleInput">TITLE *</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input"
                    name="title_head">
                <p id="error_title_head" class="text-danger"></p>


            </div>


            <div class="w-75 m-5">

                <label for="body_head">DESCRIPTION *</label>
                <textarea name="body_head" id="body_head" rows="5" cols="150"></textarea>
                <p id="error_body_head" class="text-danger"></p>
            </div>
            <div class="w-75 m-5 text-center">

                <label for="photo_head">
                    <span class="material-symbols-outlined" style="font-size:100px ">
                        upload_file
                    </span>
                    <br>
                    UPLOAD PHOTO *
                </label>
                <input type="file" name="photo_head" id="photo_head" hidden>
                <p class="text-danger" id="error_photo_head"> </p>
            </div>
            <div class="w-75 m-5 text-center">

                <label for="video_head">
                    <span class="material-symbols-outlined" style="font-size:100px">
                        smb_share
                    </span>
                    <br>
                    UPLOAD VIDEO*
                </label>
                <input type="file" name="video_head" id="video_head" hidden>
                <p class="text-danger" id="error_video_head"></p>
            </div>
            <hr>
            <h1 class="text-left"> FOOTER </h1>
            <div class="w-75 m-5">

                <label for="body_footer">DESCRIPTION *</label>
                <textarea name="body_footer" id="body_footer" rows="5" cols="150"></textarea>
                <p id="error_body_footer" class="text-danger"></p>
            </div>


            <div class="w-75 m-5 text-center">

                <label for="video_footer">
                    <span class="material-symbols-outlined" style="font-size:100px">
                        smb_share
                    </span>
                    <br>
                    UPLOAD VIDEO*
                </label>
                <input type="file" name="video_footer" id="video_footer" hidden>
                <p class="text-danger" id="error_video_footer"> </p>
            </div>


            <hr>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">PHONE *</label>
                        <input type="text" name="phone" class="form-control" id="formGroupExampleInput"
                            placeholder="phone">
                        <p id="error_phone" class="text-danger"></p>
                    </div>


                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">ADDRESS *</label>
                        <input type="text" name="address" class="form-control" id="formGroupExampleInput"
                            placeholder="ADDRESS">
                        <p id="error_address" class="text-danger"></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">EMAIL *</label>
                        <input type="text" name="email" class="form-control" id="formGroupExampleInput"
                            placeholder="EMAIL">
                        <p id="error_email" class="text-danger"></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">OPENING HOURS *</label>
                        <input type="text" class="form-control" name="opening_hours" id="formGroupExampleInput"
                            placeholder="OPENING HOURS">
                        <p id="error_opening_hours" class="text-danger"></p>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="workers">Workers *</label>
                        <input type="text" class="form-control" name="workers" required id="workers"
                            placeholder="Workers">
                        <p id="error_workers" class="text-danger"></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="hours_of_support">Hours Of Support *</label>
                        <input type="text" class="form-control" name="hours_of_support" required
                            id="formGroupExampleInput" placeholder="OPENING HOURS">
                        <p id="error_hours_of_support" class="text-danger"></p>
                    </div>
                </div>






                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">facebook</label>
                        <input type="text" class="form-control" name="facebook" id="formGroupExampleInput"
                            placeholder="facebook">

                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">instagram</label>
                        <input type="text" class="form-control" name="insta" id="formGroupExampleInput"
                            placeholder="instagram">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">X</label>
                        <input type="text" class="form-control" name="x" id="formGroupExampleInput"
                            placeholder="X">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">linked_in</label>
                        <input type="text" class="form-control" name="linked_in" id="formGroupExampleInput"
                            placeholder="linked_in">
                    </div>
                </div>

            </div>
            <div class="alert alert-danger" id="alert_error" style="display: none">
                ERROR IN DATA
            </div>
            <div class="alert alert-success" id="alert_success" style="display: none">

            </div>
            <div class="progress" id="progress" style="display: none">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    جاري التحميل ..........
                </div>
            </div>



            <div class="text-center m-5">
                <button class="btn btn-outline-success" id="submit" type="submit">UPDATE</button>



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

            $("#progress").show();
        });


        $(document).ajaxStop(function() {

            $("#progress").hide();
        });



        $(document).on('click', '#submit', function(e) {
            e.preventDefault();



            var formData = new FormData($('#formData')[0]);
            $.ajax({
                type: "POST",
                enctype: "multipart/form-data",
                url: "{{ route('about.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.msg == 'errors') {

                        $('#alert_error').show();
                        $('#alert_success').hide();




                        $('.text-danger').hide();
                        $.each(data.data, function(key, value) {

                            if (value) {
                                $('#error_' + key).text(value).show();
                            }

                            ;
                        });


                    }
                    if (data.msg == "success") {
                        $('#alert_error').hide();
                        $('#alert_success').text(data.data);

                        $('#alert_success').show();
                        return console.log(data.data);

                        $('.text-danger').hide();
                    }





                    return console.log(data.errors);


                },
                error: function(error) {
                    $('#alert_error').show();
                    $('#alert_success').hide();


                },



            })

        })
    </script>
@endsection
