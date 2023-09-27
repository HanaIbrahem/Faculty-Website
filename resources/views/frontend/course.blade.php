

@extends('frontend.layout.master')
@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
    
@endphp
@section('main')

<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n3 mb-4">

    <section class="py-5 mb-md-5">
        <div class="container">
            <div class="row border-radius-md pb-4 p-lg-3 mx-sm-0 mx-1 position-relative">
                <div class="card card-plain card-blog mt-5">
                    <div class="row">
                        <div class="col-md-5 ">
                            <div class="card-image position-relative border-radius-lg cursor-pointer">
                                <div class="blur-shadow-image">
                                    <img class="card-img" src="{{asset('images/course/'.$course->image)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-auto ms-md-3 mt-md-auto mt-4">
                            <h3 class="text-dark">{{$course->{"name$loc"} }}</h3>

                           
                            <div>
                                <p class="fw-bold">
                                 @if ($loc=='_ku')
     
                                 بەشی
     
                                 {{ $course->department->name_ku }}
     
                                 <br>
                                 ئاستی:
                                 {{$course->type}}
                               
                                 @else
                                 {{ $course->department->name }}
                                 Department
                                 <br>
                                 {{$course->type}}
                                 @endif
                                 </p>
     
     
                             </div>
                             <div>
                                {!! $course->{"description$loc"} !!}
                             </div>  
                             

                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="py-1">
        <div class="container">
            <div class="row">
                <div class="col-9 text-center mx-auto">
                    <h3 class="mb-1">{{__('message.related_course')}}</h3>
                 
                </div>
                <div class="row g-4 g-xl-5 slider-container d-flex justify-content-center">
                    @foreach ($relatedcourse as $item)
                    <div class="col-lg-4 col-sm-6 col-md-6 mx-auto mb-4 text-start">
                        <div class="card shadow-lg mt-4 h-100">
                            
                            <div class="card-body text-center d-flex flex-column">

                              
                                
                                <h4 class="flex-grow-1">
                                    <a class="text-dark"
                                        href="{{ route('forntend.course', $item->id) }}">
                                        {{ $item->{"name$loc"} }}
                                    </a>
                                </h4>
                                @if ($loc=='_ku')
                                <p class="text-dark">ئاست{{$item->type}}: یەکە{{$item->cts }}:</p>

                                @else
                                <p class="text-dark">Level:{{$item->type}}  CTS:{{$item->cts }}</p>

                                @endif
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
                
                
            </div>
        </div>
    </section>
</div>
@endsection

