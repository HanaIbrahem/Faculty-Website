@extends('frontend.layout.master')


@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp


@section('main')
    <<header class="position-relative">
        <div class="page-header min-vh-50 position-relative"
            style="background-image: url('{{ asset('images/admission/' . $admission->image) }}');" loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center mx-auto mt-n7">
                        <h3 class="text-white fadeIn2 fadeInBottom">
                            @if ($loc == '_ku')
                                فاکەڵتی زانست  
                                {{ $admission->name_ku }}
                            @else
                                Faculty of Science {{ $admission->name }} 
                            @endif
                        </h3>
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
                    <div class="row" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="col-lg-8 ms-auto me-auto">
                            <h3 class="title mb-4 text-center">
                                @if ($loc == '_ku')
                                    بەشی
                                    {{ $admission->name_ku }}
                                @else
                                    Department
                                    {{ $admission->name }}
                                @endif
                            </h3>
                            <p class="text-dark">
                                {!! $admission->{"description$loc"} !!}
                            </p>
                        </div>
                    </div>

            </section>

        </div>
@endsection
