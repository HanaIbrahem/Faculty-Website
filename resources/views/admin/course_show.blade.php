@extends('admin.layout.master')

@section('main')
<div class="container">
    <div class="m-3">
        <h3 class="">
            {{$department->name}} Science Department
        </h3>
    </div>
    <div class="col-xl-10">
        <div class="card">
            <div class="card-body">
                <div class="post-details">
                    <h3 class="mb-4 text-black">{{ $course->name }}</h3>
                    <h3 class="mb-4 text-black">{{ $course->name_ku}}</h3>
                    <p>Level: <span class="text-primary">{{$course->type}}</span></p>
                    <img src="{{ asset('images/course/' . $course->image) }}" alt="{{ $course->name }}"
                        class="img-fluid mb-3 w-50 h-50">

                    <div class="m-3 ">

                        {!! $course->description !!}
                    </div>


                    <div class="m-3">

                        {!! $course->description_ku!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection