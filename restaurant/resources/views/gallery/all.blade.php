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
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Empty</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="alrty alert-success w-75 m-auto text-center p-2" style="font-size:30px; display:none " id="alert_success">
        SUCCESS DELETE
    </div>

    <!-- row -->
    <div class="container">
        <div class="row p-5">
            @foreach ($galleries as $gallery)
                <div class="col-4 text-center">

                    <div id="mdb-lightbox-ui"></div>

                    <div class="mdb-lightbox no-margin card-{{ $gallery->id }}">

                        <figure class="col-6">
                            <a class="black-text">
                                <img alt="picture" src=" {{ 'assets_templet/img/gallery/' . $gallery->gallery }}"
                                    class="img-fluid">
                                <button class="btn btn-outline-danger delete_button text-center m-2"
                                    product_id={{ $gallery->id }}>DELETE</button>

                            </a>
                        </figure>

                    </div>

                </div>
            @endforeach
        </div>
        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    </div>
    <!-- main-content closed -->
@endsection
@section('js')


    <script>
        $(document).on('click', '.delete_button', function(e) {
            e.preventDefault();

            var product_id = $(this).attr('product_id');


            if (confirm('DELET')) {

                $.ajax({
                    type: "POST",
                    method: "DELETE",
                    url: "{{ route('galleries.destroy', '') }}" + "/" + product_id,
                    data: {
                        '_token': '{{ csrf_token() }}',

                    },
                    success: function(data) {
                        if (data.msg == "success") {
                            $('#alert_success').show();
                            $('.card-' + data.id).remove();
                            setTimeout(function() {
                                $('#alert_success').fadeOut('slow');
                            }, 3000);


                        }


                    },
                    error: function(error) {

                    }

                })

            }



        })
    </script>


@endsection
