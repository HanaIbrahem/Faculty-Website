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
        <div class="container my-4 my-sm-0 px-0 px-sm-3">
            <div class="row border-radius-md pb-4 p-lg-3 mx-sm-0 mx-1 position-relative">
                <div class="card card-plain card-blog mt-5">
                    <div class="row">

                        <div class="col-lg-12 justify-content-center d-flex flex-column">
                            <div class="card-image position-relative border-radius-lg cursor-pointer">
                               
                                <div class="blur-shadow-image">
                                    <img class="img-fluid border-radius-lg custom-imgcard" src="{{ asset('images/teacher/' . $teacher->image) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 my-auto ms-md-3 mt-md-auto mt-4">

                            <div class="p-1">
                                <h3 class="text-dark">{{$teacher->{"name$loc"} }}</h3>

                            </div>

                            <div class="mt-2 ">
                                {!! $teacher->{"description$loc"} !!}
                            </div>
                            <div class="author">
                                <p class="ps-1 text-dark mb-0">
                                    @if ($loc=='_ku')
                                        نوێکراوەتەوە لە:
                                    @else
                                    Updated at
                                    @endif
                                     {{ $teacher->updated_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="py-1">
        <div class="container my-4 my-sm-0 px-0 px-sm-3 ">
            <div class="row">
                <div class="col-9 text-center mx-auto">
                    <h3 class="mb-1">{{__('message.related_techer')}}</h3>
                 
                </div>
                
                <div class="row d-flex mt-1 justify-content-center mt-5">
                    @foreach ($relatedteacher as $item)
                        <div class="col-lg-3 col-12 col-md-6 mb-5 ">
                            <div class="card h-100 d-flex flex-column">
                                <div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">
                                    <a class="d-block blur-shadow-image">
                                        <img src="{{ asset('images/teacher/' . $item->image) }}"
                                            alt="img-blur-shadow" class="img-fluid shadow border-radius-lg"
                                            loading="lazy"
                                            style="width:100%; height:220px;
                                             object-fit: cover;"id="re">
                                    </a>
                                </div>
                                <div class="card-body text-center bg-white border-radius-lg p-3 pt-0 flex-grow-1">
                                    <h5 class="mt-3 mb-1 d-md-block d-none">
                                        <a href="{{route('forntend.teacher',$item->id)}}">{{ $item->{"name$loc"} }}</a>
                                    </h5>
                                    <p class="mb-1 d-md-none d-block text-sm font-weight-bold text-dark mt-3">
                                        <a href="{{route('forntend.teacher',$item->id)}}">{{ $item->{"name$loc"} }}
                                        </a></p>
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
