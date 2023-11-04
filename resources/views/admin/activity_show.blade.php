@extends('admin.layout.master')
@section('main')
    <div class="container">
        
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body">
                    <div class="post-details">
                        <h3 class="mb-4 text-black">{{ $activity->name }}</h3>
                        <h3 class="mb-4 text-black">{{ $activity->name_ku}}</h3>

                        <img src="{{ asset('images/activity/' . $activity->image) }}" alt="{{ $activity->name }}"
                            class="img-fluid mb-3 w-50 h-50">

                        <div class="m-3 ">

                            {!! $activity->description !!}
                        </div>


                        <div class="m-3">

                            {!! $activity->description_ku!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection