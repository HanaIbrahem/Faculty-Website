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
        <div class="page-header min-vh-50 position-relative"
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
        <div class="container">


            <div class="row mb-5">
                <div class="col-lg-12">

                  
                    <div class="row text-center justify-content-center mt-5">
                        <div class="col-lg-6">
                            <h2>
                            {{__('message.admisstion_units')}}
                            </h2>
                           
                        </div>
                     </div>

                
                     <div class="row g-4 g-xl-5 mt-2 slider-container d-flex justify-content-center">
                        @foreach ($admission as $item)
                            <div class="col-lg-4 col-sm-10 col-md-5 mx-auto">
                                <div class="card shadow-lg mt-4" style="height: 100%; display: flex; flex-direction: column;">
                                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                        <a class="d-block blur-shadow-image">
                                            <img style="width:100%; height:200px"
                                                src="{{ asset('images/admission/' . $item->image) }}"
                                                alt="{{ $item->name }}" class="img-fluid shadow border-radius-lg ">
                                        </a>
                                    </div>
                                    <div class="card-body" style="flex-grow: 1;">
                                        <h5 class="font-weight-normal"> 
                                            <a class="text-dark"
                                                href="{{ route('forntend.admission_show', $item->id) }}">{{ $item->{"name$loc"} }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


@endsection