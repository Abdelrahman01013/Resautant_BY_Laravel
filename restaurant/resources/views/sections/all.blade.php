@extends('layouts.master')
@section('title')
    All Daily Meals
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Daily</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Meals</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="container">
        <div class="alert alert-success text-center" style="font-size: 25px ;display: none" id="success_alert">
            Success:Delete Success
        </div>
        <div class="alert alert-danger text-center" style="font-size: 25px ;display:none" id="error_alert">
            Error In Data
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delet</th>



                </tr>
            </thead>

            @foreach ($sections as $section)
                <tr class="delete_section{{ $section->id }}">
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->create_at }}</td>
                    <td><a class="btn btn-outline-primary" href="{{ route('sections.edit', $section->id) }}">Update
                            </button></a>
                    <td><button class="btn btn-outline-danger delete_button" section_id="{{ $section->id }}"
                            scetion_name="{{ $section->name }}">Delete
                        </button></td>

                </tr>
            @endforeach




        </table>



    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

    <script>
        $(document).on('click', '.delete_button', function() {
            var id = $(this).attr('section_id');
            var name = $(this).attr('scetion_name');


            if (confirm('Delete ' + name)) {
                $.ajax({
                    type: "POST",
                    method: "DELETE",
                    data: {
                        '_token': "{{ csrf_token() }}",
                    },
                    url: "{{ route('sections.destroy', '') }}" + "/" + id,
                    success: function(data) {
                        if (data.msg == "success") {
                            $('#success_alert').show();
                            $('#error_alert').hide();
                            setInterval(() => {
                                $('#success_alert').fadeOut('slow');

                            }, 3000);
                        }
                        if (data.msg == "error") {
                            $('#success_alert').hide();
                            $('#error_alert').show();
                        }
                        $('.delete_section' + id).remove();
                    },
                    error: function(error) {
                        $('#success_alert').hide();
                        $('#error_alert').show();
                    }
                });
            }
        });
    </script>
@endsection
