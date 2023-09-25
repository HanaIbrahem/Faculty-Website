@extends('frontend.layout.master')

@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp

@section('main')
    <header>
        <div class="page-header min-vh-50" style="background-image: url('{{ asset('frontend/assets/img/cover.png') }}')"
            loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-white text-center">
                        <h2 class="text-white">
                            @if ($loc == '_ku')
                            زیاتر بخوێنەوە سەبەرات
                        @else
                        Read more about 
                        @endif
                            {{$activity->{"name$loc"} }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n5">
        <div class="container">


            <div class="row mb-5 p-4">
                <div class="col-lg-6 justify-content-center d-flex flex-column pl-lg-5 pt-lg-0 pt-3">
                    <h3 class="card-title">
                        <a href="javascript:;" class="text-dark">{{$activity->{"name$loc"} }}</a>
    
                    </h3>
                </div>
    
                <div class="col-lg-8 justify-content-center d-flex flex-column">
                    <div class="card">
                        <div class="d-block blur-shadow-image">
                            <img src="{{asset('images/activity/'.$activity->image)}}" alt="img-blur-shadow-blog-2" class="img-fluid border-radius-lg" loading="lazy">
                        </div>
    
                    </div>
    
                </div>
                <div class="col-lg-6 justify-content-center d-flex flex-column pl-lg-5 pt-lg-0 pt-3">
                   
    
                    <div  class="d-flex mt-4">
                        <span class="text-info">
                            @if ($loc == '_ku')
                            بەروار:
                        @else
                            Date:
                        @endif
                        </span>
                        {{ date('M j, Y', strtotime($activity->date)) }}

                    
                    </div>
    
                    <div  class="d-flex mt-4 card-description">
                       {!! $activity->{"description$loc"} !!}

                    </div>
                    <p class="author">
                        <span class="font-weight-bold text-warning">
                            @if ($loc == '_ku')
                            بڵاوکراوەتەوە لە:
                        @else
                            Posted at:
                        @endif
                        </span>{{$activity->created_at->format('M j, Y')}}
                    </p>
    
                </div>
          </div>

        </div>
    </div>
@endsection
