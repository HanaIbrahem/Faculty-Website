@extends('frontend.layout.master')

@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
    $faculty = \App\Models\Faculty::find(1);

@endphp

@section('main')
    <header>
        <div class="page-header min-vh-75" style="background-image: url('{{ asset('images/'.$faculty->cover) }}')"
            loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container">
                <div class="row">
                  
                    <div class="col-lg-6 mx-auto text-white text-center">
                      <h2 class="text-white">{{__('message.activity_hader')}}</h2>
                  </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n5">
        <div class="container my-4 my-sm-0 px-0 px-sm-3 ">


            <div class="row" id="activity_data">
              @include('frontend.inc.activity_data')
            </div>

        </div>
    </div>
@endsection


@push('scripts')
<script src="{{asset('backend/assets/vendor/jqury/jquery-3.6.0.min.js')}}"></script>

  <script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
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
        url: "{{ route('more-activity') }}" + "?page=" + page,
        success:function(data) {
          $('#activity_data').html(data);
        }
      });
    }
  </script>

  @endpush