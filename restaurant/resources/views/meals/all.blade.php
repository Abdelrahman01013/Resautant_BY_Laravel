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

    <div class="row">
        <div class="col-8">

            <div class="input-group w-100 m-auto">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" id="search" />
            </div>
        </div>

        <div class="col-4">
            {{-- <input type="text" class="w-100"> --}}

            <div class="" style="">
                <select class="form-select form-select-lg w-50" name="section_id" id="section_id" style="font-size: 22px">
                    <option value="All">All</option> <!-- تم تغيير قيمة الخيار لـ "All" -->
                    @foreach ($sections as $section)
                        <option value="{{ $section->name }}">{{ $section->name }}</option>
                    @endforeach
                </select>
                Select Daily Meals
            </div>

        </div>
    </div>






    <br>
    <hr>
    <br>


    <div class="alrty alert-success w-75 m-auto text-center p-2" style="font-size:30px; display:none " id="alert_success">
        SUCCESS DELETE
    </div>


    <!-- row -->
    <div class="row" id="meals-container">
        {{-- Dynamic content will be inserted here --}}
    </div>
    <div class="row">


        @foreach ($meals as $meal)
            <div class="col-4 card-{{ $meal->id }} meal-card">
                <div class="card p-3" style="width: 17rem;">
                    <img src="{{ 'assets_templet/img/menu/' . $meal->photo }}" class="card-img-top"
                        alt="{{ $meal->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $meal->name }}</h5>
                        <hr>
                        <h5 class="card-section">{{ $meal->section->name }}</h5>
                        <hr>
                        <p class="card-text">
                            {{ $meal->components }}

                        </p>
                        <div class="text-center">
                            <a class="btn btn-outline-primary" href="{{ route('meals.edit', $meal->id) }}">Update</a>
                            <button class="btn btn-outline-danger delete_button" product_id={{ $meal->id }}
                                product_name={{ $meal->name }}>DELETE</button>


                        </div>

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

            var product_id = $(this).attr('product_id');
            var product_name = $(this).attr('product_name');

            if (confirm('DELET ' + product_name)) {

                $.ajax({
                    type: "POST",
                    method: "DELETE",
                    url: "{{ route('meals.destroy', '') }}" + "/" + product_id,
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



        });

        $(document).ready(function() {
            $('#search').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();

                $('.card').each(function() {

                    var mealName = $(this).find('.card-title').text()
                        .toLowerCase();
                    if (mealName.includes(
                            searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });





        $(document).on('change', '#section_id', function(e) {
            e.preventDefault();

            var selectedSection = $(this).val().toLowerCase();

            $('.meal-card').each(function() {
                var mealSection = $(this).find('.card-section').text().toLowerCase();

                if (selectedSection === 'all' || mealSection.includes(selectedSection)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

        })
    </script>




@endsection
