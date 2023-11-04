@extends('frontend.layout.master')
@php
    $loc = '';
    if (Session::get('locale')=='ku') {
        $loc='_ku';
    }
    
@endphp
@section('main')

    <header>
        <div class="page-header min-vh-75" style="background-image: url('{{ asset('frontend/assets/img/cover.png') }}')" loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-white text-center">
                        <h2 class="text-white">{{__('message.research_header')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n3 mb-4">
        <div class="container my-4 my-sm-0 px-0 px-sm-3">
            <div class="row">
                <div class="col-lg-4 ml-auto order-md-2">
                    <div class="pt-1 pb-5 position-sticky top-1 mt-lg-5">
                        <h4 class="mt-lg-5 pt-3">
                            @if ($loc=='_ku')
                            نامەی توێژینەوە                           
                            @else
                            Research Letter

                            @endif
                        </h4>
                       
                        <p class=" text-secondary">{{__('message.research_letter')}}</p>





                        {{-- <div class="input-group input-group-dynamic mb-4" style="width:100%">
                            <form action="" method="post">
                                @csrf
                                <input class="form-control" placeholder="{{__('message.search')}}" id="search-input" type="text"
                                    name="search">
                            </form>
                        </div> --}}
                        <h3 class="sidebar-title">
                            @if ($loc=='_ku')
                                        
                            پۆلێنکردن
                            @else
                            Categories
                            @endif
                            </h3>


                        <div class="card justify-content-center mb-3">
                            <ul class="mt-3">
                                @foreach ($research_count as $catygory)
                                    <li style="list-style: none">
                                        <a
                                            href="{{route('forntend.research_catygory',$catygory->department->id)}}">
                                            {{ $catygory->department->{"name$loc"} }}
                                             <span class="hilite text-info">({{ $catygory->count }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        </a>

                    </div>
                </div>
                <div class="col-lg-8 order-md-1">

                    
                    
                    <section class="mt-md-7">
                        <h3 class="fs-4"> 
                        {{__('message.discover_rese')}}
                        </h3>
                       
                    </section>
                   
                    <div id="research_data">
                    @include('frontend.inc.research_data')
                    </div>
                </div>
               

            </div>
        </div>
    </div>

<input id="department_id" type="hidden" value="{{$id}}" name="id">

    
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
      var departmentId = $('#department_id').val(); // Assuming you have an input field with id 'department_id'



      $.ajax({
        type: "GET",
        data: {
          'search_query':search,
          'department_id': departmentId,

        },
        url: "{{ route('more-research') }}" + "?page=" + page,
        success:function(data) {
          $('#research_data').html(data);
        }
      });
    }
  </script>

  @endpush