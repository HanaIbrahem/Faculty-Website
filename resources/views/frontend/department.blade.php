@extends('frontend.layout.master')


@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp


@section('main')
    <<header class="position-relative">
        <div class="page-header min-vh-75 position-relative"
            style="background-image: url('{{ asset('images/department/' . $department->image) }}');" loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container mt-5">
                <div class="row justify-content-center" data-aos="fade-down">
                    <div class="col-lg-6 text-center mx-auto mt-n7">
                        <h1 class="text-white fadeIn2 fadeInBottom">
                            @if ($loc == '_ku')
                                {{ $department->name_ku }}
                            @else
                                 {{ $department->name }} 
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
                <div class="container my-4 my-sm-0 px-0 px-sm-3">
                    <div class="row" >
                        <div class="col-lg-8 ms-auto me-auto">
                            <h3 class="title mb-4 text-center" data-aos="zoom-in" >
                                @if ($loc == '_ku')
                                    بەشی
                                    {{ $department->name_ku }}
                                @else
                                    Department
                                    {{ $department->name }}
                                @endif
                            </h3>
                            <p class="text-dark">
                                {!! $department->{"description$loc"} !!}
                            </p>
                        </div>
                    </div>

            </section>


            <section class="features-3 py-4">
                <div class="container my-4 my-sm-0 px-0 px-sm-3">
                    <div class="row text-center justify-content-center">
                        <div class="col-lg-6">
                            <span class="badge rounded-pill bg-primary  mb-2">
                                @if ($loc == '_ku')
                                    کۆرسەکان
                                @else
                                    Courses
                                @endif

                            </span>
                            <h2  data-aos="zoom-in" >{{ __('message.course_header1') }} </h2>
                            <p>
                                {{ __('message.course_header') }}
                            </p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4 m-0 p-1 d-flex align-items-center">

                            <div class="position-sticky top-1 z-index-1">
                                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                    <i
                                        class="ms-3 mt-2 me-1 material-icons text-gradient text-dark text-2xl fa fa-filter"></i>

                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0" id="dropdownMenuPages5" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            {{ __('message.Level') }}
                                            <img src="{{ asset('frontend/assets/img/down-arrow-dark.svg') }}"
                                                class="arrow ms-auto ms-md-2">
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-animation dropdown-md border-radius-lg"
                                            aria-labelledby="dropdownMenuPages5">
                                            <div class="d-lg-block">
                                                <p class="text-sm m-0 p-0"><a
                                                        href="{{ route('frontend.department_f', ['id' => $department->id, 'type' => 'bachelor']) }}">{{ __('message.bechelor') }}</a>
                                                </p>
                                                <p class="text-sm m-0 p-0"><a
                                                        href="{{ route('frontend.department_f', ['id' => $department->id, 'type' => 'high']) }}">{{ __('message.high') }}</a>
                                                </p>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>

                            {{-- <div class="pt-1 pb-5 position-sticky top-1 z-index-1 mt-3 mt-lg-5 ">
                             <ul class=" mt-3 ms-2 list-unstyled">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mb-0 px-0 py-1 show" id="dropdownMenuPages5" data-bs-toggle="dropdown" aria-expanded="true" aria-selected="false" tabindex="-1" role="tab">
                                        Level
                                        <img src="{{asset('frontend/assets/img/down-arrow-dark.svg')}}" class="arrow ms-auto ms-md-2">
                                    </a>
                                

                                    <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3 show" aria-labelledby="dropdownMenuPages5" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(469.6px, -40px, 0px);" data-popper-placement="top-start">
                                        <div class="d-lg-block">
                                          <p class="text-sm m-0 p-0"><a href="{{route('frontend.department_f', ['id' => $department->id, 'type' => 'bachelor'])}}">Bechelor</a></p>
                                          <p class="text-sm m-0 p-0"><a href="{{route('frontend.department_f', ['id' => $department->id, 'type' => 'high'])}}">High Education</a></p>
                                        </div>   
                                    </div>
                                </li>
                             </ul>
                            </div> --}}


                        </div>

                    </div>

                    <div id="course-container">
                        @include('frontend.inc.course_data')
                    </div>


                </div>
            </section>

            <section class="py-2">
                <div class="container my-4 my-sm-0 px-0 px-sm-3">
                    <div class="row">
                        <div class="col-9 text-center mx-auto">
                            <h3 class="mb-1" data-aos="zoom-in" >
                                @if ($loc == '_ku')
                                    مامۆستایانی بەشی
                                    {{ $department->name_ku }}
                                @else
                                    {{ $department->name }} Scince Teachers
                                @endif
                            </h3>
                            <p class="mb-1">{{ __('message.department_teacher') }}</p>
                        </div>
                        <div id="teacher-container">
                            @include('frontend.inc.teacher_data')
                        </div>
                     

                    </div>
                    
                </div>
            </section>


        </div>
        

        <input type="hidden" value="{{$department->id}}" id="department_id" name="id">
        <input type="hidden" value="{{$type}}" id="type" name="type">

    @endsection


    @push('scripts')
    <script src="{{ asset('backend/assets/vendor/jqury/jquery-3.6.0.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.teacher-pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getMoreTeachers(page);
            });

            $(document).on('click', '.course-pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getMoreCourses(page);
            });
        });

        function getMoreTeachers(page) {
            var search = $('#search').val();
            var departmentId = $('#department_id').val();

            $.ajax({
                type: "GET",
                data: {
                    'search_query': search,
                    'department_id': departmentId,

                },
                url: "{{ route('more-teacher') }}" + "?page=" + page,
                success: function(data) {
                    $('#teacher-container').html(data);
                }
            });
        }

        function getMoreCourses(page) {
            var search = $('#search').val();
            var departmentId = $('#department_id').val();
            var coursetype = $('#type').val();

            $.ajax({
                type: "GET",
                data: {
                    'search_query': search,
                    'department_id': departmentId,
                    'type': coursetype,
                },
                url: "{{ route('more-course') }}" + "?page=" + page,
                success: function(data) {
                    $('#course-container').html(data);
                }
            });
        }
    </script>
@endpush
