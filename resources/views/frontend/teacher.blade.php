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
                        <div class="col-md-5">
                            <div class="card-image position-relative border-radius-lg cursor-pointer">
                                <div class="blur-shadow-image">
                                    <img class="card-img" src="{{ asset('images/teacher/' . $teacher->image) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-auto ms-md-3 mt-md-auto mt-4">
                            <h3 class="text-dark">{{ $teacher->{"name$loc"} }}</h3>

                            <div>
                                {!! $teacher->{"description$loc"} !!}
                            </div>
                            <div class="author">
                                <p class="ps-1 text-dark mb-0">Updated at {{ $teacher->updated_at }}
                                </p>
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
                    <h3 class="mb-1">{{__('message.related_techer')}}</h3>
                 
                </div>
                <div class="row g-4 g-xl-5 slider-container d-flex mt-1 justify-content-center">
                    @foreach ($relatedteacher as $item)
                        <div class="col-lg-3 col-sm-6 col-md-4 mx-auto mb-4 text-start">
                            <div class="card shadow-lg mt-4 h-100">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <a class="d-block blur-shadow-image">
                                        <img style="width:100%; height:200px"
                                             src="{{ asset('images/teacher/'.$item->image) }}"
                                             alt="{{ $item->name }}"
                                             class="img-fluid shadow border-radius-lg">
                                    </a>
                                </div>
                                <div class="card-body text-center d-flex flex-column">
                                    <h4 class="flex-grow-1">
                                        <a class="text-dark"
                                            href="{{ route('forntend.teacher', $item->id) }}">
                                            {{ $item->{"name$loc"} }}
                                        </a>
                                    </h4>
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
