@extends('frontend.layout.master')


@php
    $loc='';
    if (Session::get('locale') == 'ku') {
     $loc='_ku';
    } 
@endphp


@section('main')
<<header class="position-relative">
    <div class="page-header min-vh-75 position-relative"
        style="background-image: url('{{ asset('images/department/'.$department->image) }}');" loading="lazy">
        <span class="mask bg-gradient-dark"></span>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center mx-auto mt-n7">
                    <h1 class="text-white fadeIn2 fadeInBottom">
                        @if ($loc=='_ku')
                        فاکەڵتی زانست بەشی 
                        {{ $department->name_ku }} 
                        @else
                            Faculty of Science {{$department->name}} Department
                        @endif
                    </h1>
                    {{-- <p class="lead mb-5 fadeIn3 fadeInBottom text-white opacity-8">
                        Stay connected for life to our University community.
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</header>

 {{-- Body --}}
 <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n5">
    <section class="py-5 mt-2">
        <div class="container">
            <div class="row" data-aos="zoom-in"  data-aos-duration="1000">
                <div class="col-lg-8 ms-auto me-auto">
                    <h3 class="title mb-4 text-center">
                        @if ($loc=='_ku')
                            بەشی 
                            {{$department->name_ku }}
                        @else
                            Department
                            {{$department->name}}
                        @endif
                    </h3>
                    <p class="text-dark">
                        {!!$department->{"description$loc"} !!}
                    </p>
                </div>
            </div>

    </section>



    <section class="py-7">
        <div class="container">
          <div class="row">
            <div class="col-9 text-center mx-auto">
              <h3 class="mb-1">
                @if ($loc=='_ku')
                  مامۆستایانی بەشی 
                  {{$department->name_ku}}
                @else
                {{$department->name}} Scince Teachers
                @endif
              </h3>
              <p class="mb-6 px-md-6">{{__('message.department_teacher')}}</p>
            </div>
            @foreach ( $teacher as $item)
            <div class="col-lg-4 mb-lg-0 mb-4">
              <div class="card">
                <div class="card-header p-0 mx-3 mt-n4 position-relative z-index-1">
                  <a href="javascript:;" class="d-block blur-shadow-image">
                    <img src="{{asset('images/teacher/'.$item->image)}}" class="img-fluid border-radius-md" alt="anastasia" loading="lazy">
                  </a>
                </div>
                <div class="card-body">
                  {{-- <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold">House</span> --}}
                  <a href="javascript:;" class="card-title mt-3 h5 d-block text-darker">
                    {{ $item->{"name$loc"} }}
                  </a>
                  <p class="card-description mb-4">
                    {!! $item->{"description$loc"} !!}
                  </p>
        
                </div>
              </div>
            </div>
            @endforeach
         
            
          </div>
        </div>
      </section>
       <!-- pagination start -->
       <div class="pagination pagination-primary m-4 pagination-wrap" style="margin-left:10%">
        {{ $teacher->links('vendor.pagination.custom') }}
       </div>
    <!-- pagination end -->


@endsection