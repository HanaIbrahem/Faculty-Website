@extends('frontend.layout.master')

@php
    $loc='';
    if (Session::get('locale') == 'ku') {
       $loc='_ku';
    } 
@endphp
@section('main')
<header>
    <div class="page-header min-vh-50" style="background-image: url('{{ asset('images/1773557744422857.png') }}')" loading="lazy">
        <span class="mask bg-gradient-dark"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-white text-center">
                    <h2 class="text-white">{{__('message.contact')}}</h2>
                    <p>
                        {{__('message.contact_header')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="page-header">
   

    <div class="page-header w-100 " >
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-center flex-column order-lg-1">

                    <div class="card card-body d-flex justify-content-center shadow-lg p-5 blur align-items-center">
                       
                        <h3 class="text-center">{{__('message.contact')}}</h3>
                        @if (count($errors))
                        <div class="alert alert-danger text-white  ">
                            @foreach ($errors->all() as $error )
                                <p class="">{{$error}}</p>
                            @endforeach
                        </div>
                            
                        @endif
                        <form action="{{route('contact.store')}}" dir="{{$loc=='_ku'?'rtl':'ltr'}}" id="contact-form" method="post" >
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static mb-4">
                                            <label>{{__('message.first_name')}}</label>
                                            <input class="form-control" placeholder="" aria-label="First Name..."
                                                type="text" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-2">
                                        <div class="input-group input-group-static">
                                            <label>{{__('message.last_name')}}</label>
                                            <input type="text" class="form-control" 
                                                aria-label="Last Name..."  name="lname">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="input-group input-group-static">
                                        <label>{{__('message.email')}}</label>
                                        <input type="email"  name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label>{{__('message.message')}}</label>
                                    <textarea name="message"  name="message" class="form-control" id="message" rows="4"></textarea>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <button type="submit" class="btn bg-gradient-dark w-100">{{__('message.send')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2">
                    
                    <div class="position-relative w-100 h-100 rounded-3 z-index-0 d-none d-sm-none d-md-block"
                         style="background-image: url('{{ asset('images/images.jpg') }}'); background-size: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection