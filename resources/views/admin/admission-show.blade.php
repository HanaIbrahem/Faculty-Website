@extends('admin.layout.master')
@php
    $i=1;
@endphp

@section('main')

    <div class="container">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body">
                    <div class="post-details">
                        <h3 class="mb-4 text-black">{{ $admission->name }}</h3>
                        <h3 class="mb-4 text-black">{{ $admission->name_ku }}</h3>

                        <img src="{{ asset('images/admission/' . $admission->image) }}" alt=""
                            class="img-fluid mb-3 w-50 h-50">

                        <div class="m-3 ">

                            {!! $admission->description !!}
                        </div>

                        
                        <div class="m-3">

                            {!! $admission->description_ku!!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    

@endsection



