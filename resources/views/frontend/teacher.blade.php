@extends('frontend.layout.master')
@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
    
@endphp
@section('main')


    <section class="py-5 mb-md-5">
        <div class="container">
            <div class="row border-radius-md pb-4 p-lg-3 mx-sm-0 mx-1 position-relative">
                <div class="card card-plain card-blog mt-5">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card-image position-relative border-radius-lg cursor-pointer">
                                <div class="blur-shadow-image">
                                    <img class="card-img" src="{{asset('images/teacher/'.$teacher->image)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-auto ms-md-3 mt-md-auto mt-4">
                            <h3 class="text-dark">{{$teacher->{"name$loc"} }}</h3>

                            <div>
                                {!! $teacher->{"description$loc"} !!}
                            </div>
                            <div class="author">
                                <p class="ps-1 text-dark mb-0">Updated at {{$teacher->updated_at}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
