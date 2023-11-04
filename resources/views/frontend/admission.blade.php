@php
    $faculty = \App\Models\Faculty::find(1);
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp

@extends('frontend.layout.master')

@section('swiper-css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
@endsection

@section('main')
    {{-- Headre  --}}
    <<header class="position-relative">
        <div class="page-header min-vh-75 position-relative"
            style="background-image: url('{{ asset('frontend/assets/img/cover.png') }}');" loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center mx-auto mt-n7">
                        <h2 class="text-white fadeIn2 fadeInBottom">
                            {{__('message.admisstion_heder')}}
                        </h2>
                
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n5">
        <div class="container my-4 my-sm-0 px-0 px-sm-3">


            <div class="row mb-5">
                <div class="col-lg-12">

                  
                    <div class="row text-center justify-content-center mt-5">
                        <div class="col-lg-6">
                            <h2>
                            {{__('message.admisstion_units')}}
                            </h2>
                           
                        </div>
                    </div>

                
                
                    <div id="admission_data">
                        @include('frontend.inc.admission_data')

                    </div>
                    
                </div>
            </div>
        </div>
    </div>


@endsection


@push('scripts')
<script src="{{asset('backend/assets/vendor/jqury/jquery-3.6.0.min.js')}}"></script>

  <script>
    $(document).ready(function() {
        $(document).on('click', '#ad .pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getMoreUsers(page);
        });
    });


    function getMoreUsers(page) {

      var search = $('#search').val();



      $.ajax({
        type: "GET",
        data: {
          'search_query':search,
        },
        url: "{{ route('more-admission') }}" + "?page=" + page,
        success:function(data) {
          $('#admission_data').html(data);
        }
      });
    }
  </script>

  @endpush