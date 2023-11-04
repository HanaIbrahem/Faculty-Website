@extends('admin.layout.master')
@section('main')
    <div class="container">
        
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body">
                    <div class="post-details">
                        <h3 class="mb-4 text-black">{{ $staff->name }}</h3>
                        <h3 class="mb-4 text-black">{{ $staff->name_ku}}</h3>

                        <img src="{{ asset('images/staff/' . $staff->image) }}" alt="{{ $staff->name }}"
                            class="img-fluid mb-3 w-50 h-50">

                        <div class="m-3 ">

                            {!! $staff->description !!}
                        </div>


                        <div class="m-3">

                            {!! $staff->description_ku!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection