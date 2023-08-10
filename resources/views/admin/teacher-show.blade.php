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
                        <h3 class="mb-4 text-black">{{ $teacher->name }}</h3>
                        <img src="{{ asset('images/teacher/' . $teacher->image) }}" alt=""
                            class="img-fluid mb-3 w-50 h-50">

                        <div class="m-3 ">

                            {!! $teacher->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection