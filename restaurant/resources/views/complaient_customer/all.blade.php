@extends('layouts.master')
@section('title')

@stop
@section('css')

    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
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
    <div class="alrty alert-success w-75 m-auto text-center p-2" style="font-size:30px; display:none" id="alert_success">
        SUCCESS Request
    </div>
    <!-- row -->
    <div class="col-xl-12">
        <div class="card ">
            <div class="card-header pb-0 ">
                <div class="d-flex justify-content-between text-center">
                    <h4 class="card-title mg-b-0">All Orders</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example2">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">Castomer Name</th>
                                <th class="wd-15p border-bottom-0">Customer Email</th>
                                <th class="wd-15p border-bottom-0">DELETE</th>

                                <th class="wd-25p border-bottom-0">complaint</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $complaint)
                                <tr class="order-{{ $complaint->id }}">
                                    <td>{{ $loop->index + 1 }} </td>
                                    <td>{{ $complaint->name }} </td>
                                    <td>{{ $complaint->email }} </td>

                                    <td>
                                        <button class="btn btn-outline-info delete_button" product_id={{ $complaint->id }}
                                            product_name={{ $complaint->name }}>Success</button>
                                    </td>

                                    <td>{{ $complaint->complaint }} </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection


@section('js')


    <script>
        $(document).on('click', '.delete_button', function(e) {
            e.preventDefault();

            var product_id = $(this).attr('product_id');
            var product_name = $(this).attr('product_name');

            if (confirm('Order Done ' + product_name)) {

                $.ajax({
                    type: "POST",
                    method: "DELETE",
                    url: "{{ route('complaints.destroy', '') }}" + "/" + product_id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'value': 1

                    },
                    success: function(data) {
                        if (data.msg == "success") {
                            $('#alert_success').show();
                            $('.order-' + data.id).remove();
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



    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>






@endsection
