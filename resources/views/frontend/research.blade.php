@extends('frontend.layout.master')
@php
    $loc = '';
    if (Session::get('locale')=='ku') {
        $loc='_ku';
    }
    
@endphp
@section('main')
    <header>
        <div class="page-header min-vh-50" style="background-image: url('{{ asset('images/department/Biology1774650001858003.jpg') }}')" loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-white text-center">
                        <h2 class="text-white">{{__('message.research_header')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n3 mb-4">
        <div class="container ">
            <div class="row">
                <div class="col-lg-4 ml-auto order-md-2">
                    <div class="pt-1 pb-5 position-sticky top-1 mt-lg-5">
                        <h4 class="mt-lg-5 pt-3">
                            @if ($loc=='_ku')
                            نامەی توێژینەوە                           
                            @else
                            Research Letter

                            @endif
                        </h4>
                       
                        <p class=" text-secondary">{{__('message.research_letter')}}</p>





                        <div class="input-group input-group-dynamic mb-4" style="width:100%">
                            <form action="" method="post">
                                @csrf
                                <input class="form-control" placeholder="{{__('message.search')}}" id="search-input" type="text"
                                    name="search">
                            </form>
                        </div>
                        <h3 class="sidebar-title">
                            @if ($loc=='_ku')
                                        
                            پۆلێنکردن
                            @else
                            Categories
                            @endif
                            </h3>


                        <div class="card justify-content-center mb-3">
                            <ul class="mt-3">
                                @foreach ($research_count as $catygory)
                                    <li style="list-style: none">
                                        <a
                                            href="">
                                            {{ $catygory->department->{"name$loc"} }}
                                             <span class="hilite text-info">({{ $catygory->count }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        </a>

                    </div>
                </div>
                <div class="col-lg-8 order-md-1">

                    
                    {{-- <section class="mt-5">
                        <h3 class="fs-4"> 
                            Discover Reseearchs
                        </h3>
                        <div class="input-group input-group-dynamic">
                            <form action="" method="post">
                                @csrf

                                <input class="input-group form-control"    placeholder="{{__('message.search')}}" id="search-input" type="text"
                                    name="search">
                            </form>
                        </div>
                    </section> --}}
                    <section class="mt-5 pt-lg-5">
                        @foreach ($research as $item )
                        <div class="row mb-3">
                            <div class="card">
        
                                <div class="card-header pb-1 mb-1">
            
                                    <h3 class="fs-5 text-dark">
                                        <a href="{{route('forntend.research_show',$item->id)}}">{{$item->{"name$loc"} }}</a>
                                    </h3>
                                </div>
            
                                <div class="card-body pt-1">
            
                                    <p>{!! Str::limit($item->{"description$loc"},200) !!}</p>
                                    <p>{{ $item->created_at->format('d/m/y')}}</p>

                                </div>
            
                            </div>
                        </div>
                        @endforeach
                    </section>
                   
                </div>
               

            </div>
        </div>
    </div>



    
@endsection