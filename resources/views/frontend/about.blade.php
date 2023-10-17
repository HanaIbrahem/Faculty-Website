@extends('frontend.layout.master')

@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp

@section('main')
    <header>
        <div class="page-header min-vh-75" style="background-image: url('{{ asset('frontend/assets/img/cover.png') }}')"
            loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-white text-center">
                        <h2 class="text-white">{{__('message.activity_hader')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n5">
        <div class="container my-4 my-sm-0 px-0 px-sm-3 ">


            <div class="row">
                <div class="col-lg-12">

                      {{-- start foreach --}}
                      @foreach ($activity as $item)
                      <div class="row mb-5 p-4 shadow shadow-lg"data-aos="fade-left" data-aos-duration="1000">
                          <div class="col-lg-6 justify-content-center d-flex flex-column">
                              <div class="card">
                                  <div class="d-block blur-shadow-image">
                                      <img src="{{ asset('images/activity/' . $item->image) }}"
                                          alt="img-blur-shadow-blog-2" class="img-fluid border-radius-lg"
                                          loading="lazy">
                                  </div>

                              </div>
                          </div>
                          <div class="col-lg-6 justify-content-center d-flex flex-column pl-lg-5 pt-lg-0 pt-3">
                              <h3 class="card-title">
                                  <a href="{{ route('forntend.activity', $item->id) }}"
                                      class="text-dark">{{ $item->{"name$loc"} }}</a>
                              </h3>

                              <div id="" class="d-flex">

                                  <p class="author">
                                      <span class="font-weight-bold text-warning">
                                          @if ($loc == '_ku')
                                              بەروار:
                                          @else
                                              Date:
                                          @endif
                                          {{ date('d/m/y', strtotime($item->date)) }}
                                  </p>

                              </div>

                              <p class="card-description">
                                  {!! Str::limit($item->{"description$loc"}, 200) !!}
                                  <a href="{{ route('forntend.activity', $item->id) }}"
                                      class="text-darker icon-move-right text-sm">
                                      @if ($loc == '_ku')
                                          زیاتر بخوێنەوە
                                          <i class="fas fa-arrow-left text-xs ms-1" aria-hidden="true"></i>
                                      @else
                                          Read More
                                          <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                                      @endif
                                  </a>
                              </p>
                              <p class="author">
                                  <span class="font-weight-bold text-warning">
                                      @if ($loc == '_ku')
                                          بڵاوکراوەتەوە لە:
                                      @else
                                          Posted at:
                                      @endif
                                  </span></a>, {{ $item->created_at->format('d/m/y') }}

                              </p>

                          </div>





                      </div>
                  @endforeach

                  {{-- end foreach --}}



                    {{-- start pasgnination --}}

                    <div class="pagination pagination-primary m-4 pagination-wrap" style="margin-left:10%">
                        {{ $activity->links('vendor.pagination.custom') }}
                    </div>


                    {{-- end pasigniation --}}
                </div>
            </div>

        </div>
    </div>
@endsection
