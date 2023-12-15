@extends('layouts.master')

@section('title')
    ALL CHEFS

@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Chefs</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All
                    Chefs</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

    <div class="alrty alert-success text-center" style="font-size:50px; display: none" id="alert_success">
        SUCCESS DELETE
    </div>
    <!-- row -->

    <div class="row">



        @foreach ($chefs as $chef)
            <div class="col-3 m-5">
                <div class="card-{{ $chef->id }} p-3" style="width: 18rem; border:solid 5px gray ">
                    <img src="{{ URL::asset('assets_templet/img/chefs/' . $chef->photo) }}" class="card-img-top"
                        alt="{{ $chef->name }}">
                    <div class="card-body">
                        <h5 class="card-title text-left">{{ $chef->name }}</h5>
                        <p class="card-text text-left">
                            <HR>

                            {{ $chef->description }}
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">{{ $chef->job }}</li>

                    </ul>
                    <div class="card-body text-center ">
                        <a href="{{ route('chef.edit', $chef->id) }}" class="btn btn-outline-primary">UPDATE</a>





                        <button class="btn btn-outline-danger delete_button" chef_id={{ $chef->id }}
                            chef_name={{ $chef->name }}>DELETE</button>



                    </div>
                </div>
            </div>
        @endforeach

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

            var chef_id = $(this).attr('chef_id');
            var chef_name = $(this).attr('chef_name');

            if (confirm('DELET ' + chef_name)) {

                $.ajax({
                    type: "POST",
                    method: "DELETE",
                    url: "{{ route('chef.destroy', '') }}" + "/" + chef_id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': chef_id
                    },
                    success: function(data) {
                        if (data.msg == "success") {
                            $('#alert_success').show();
                            $('.card-' + data.id).remove();


                        }


                    },
                    error: function(error) {

                    }

                })

            }



        })
    </script>



@endsection
