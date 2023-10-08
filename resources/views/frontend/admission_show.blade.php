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

                            <div class="col-lg-12 justify-content-center d-flex flex-column">
                                <div class="card-image position-relative border-radius-lg cursor-pointer">
                                    <div class="p-3">
                                        <h3 class="text-dark">{{ $admission->{"name$loc"} }}</h3>

                                    </div>
                                    <div class="blur-shadow-image">
                                        <img class="img-fluid border-radius-lg custom-imgcard"
                                            src="{{ asset('images/admission/' . $admission->image) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 my-auto ms-md-3 mt-md-auto mt-4">


                                <div class="mt-3">
                                    {!! $admission->{"description$loc"} !!}
                                </div>



                                <div>
                                    <p class="p-3 author">
                                        <span class="font-weight-bold text-warning">
                                            @if ($loc == '_ku')
                                                بڵاوکراوەتەوە لە:
                                            @else
                                                Posted at:
                                            @endif
                                        </span>{{ $admission->created_at->format('M j, Y') }}
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    @endsection
