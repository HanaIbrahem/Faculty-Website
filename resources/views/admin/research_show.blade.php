@extends('admin.layout.master')
@section('main')
    <div class="container">
        <div class="m-3">
            <h3 class="">
                {{$research->department->name}} Science Department
            </h3>
        </div>
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body">
                    <div class="post-details">
                        <h3 class="mb-4 text-black">{{ $research->name }}</h3>
                        <h3 class="mb-4 text-black">{{ $research->name_ku}}</h3>

                        <img src="{{ asset('images/research/' . $research->image) }}" alt="{{ $research->name }}"
                            class="img-fluid mb-3 w-50 h-50">

                        <div class="m-3 ">

                            {!! $research->description !!}
                        </div>


                        <div class="m-3">

                            {!! $research->description_ku!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection