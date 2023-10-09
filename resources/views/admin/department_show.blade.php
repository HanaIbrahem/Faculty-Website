@extends('admin.layout.master')
@php
    $i=1;
@endphp

@section('datatablestyle')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables/css/jquery.dataTables.min.css') }}">

@endsection
@section('main')

    <div class="container">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body">
                    <div class="post-details">
                        <h3 class="mb-4 text-black">{{ $department->name }}</h3>
                        <h3 class="mb-4 text-black">{{ $department->name_ku }}</h3>

                        <img src="{{ asset('images/department/' . $department->image) }}" alt=""
                            class="img-fluid mb-3 w-50 h-50">

                        <div class="m-3 ">

                            {!! $department->description !!}
                        </div>

                        
                        <div class="m-3">

                            {!! $department->description_ku!!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <section class="py-4">
        <div class="container">
            <h3>{{$department->name}} Teachers</h3>

            <div class="d-flex m-3">
                <a href="{{route('teacher.create',$department->id)}}" class="btn btn-primary">Add Teacher </a>
            </div>

            @if (count($teachers)>0)
            <div class="row mt-8 mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List of Teachers</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Department</th>
                                            <th>Pins</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($teachers as $item)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td><a href="{{route('teacher.show',$item->id)}}">{{$item->name}}</a>
                                                <p><a href="{{route('teacher.show',$item->id)}}">{{$item->name_ku}}</a></p>
                                                </td>
                                                <td><img src="{{asset('images/teacher/'.$item->image)}}" style="max-width:150px;max-height: 150px" class="img" alt=""></td>
                                             
                                                <td>{{$department->name}}</td>
                                                <td>{{$item->pin}}</td>
                                                <td ><small>
                                                    {{ date('M j, Y', strtotime($item->created_at)) }}

                                                </small></td>
                                                <td><small>
                                                    {{ date('M j, Y', strtotime($item->updated_at)) }}</small></td>
            
                                                <td>
                                                    <div class="d-flex">
                                                    
                                                        <div style="margin-right: 4px">
                                                            <a href="{{route('teacher.destroy',$item->id)}}" class="btn btn-danger shadow btn-xs sharp " id="delete"><i class="fa fa-trash"></i></a>
                                                        </div>
            
                                                        <div >
                                                            <a href="{{route('teacher.edit',$item->id)}}" class="btn btn-warning shadow btn-xs sharp"><i class="fa fa-pen"></i></a>
                                                        </div>
                                                        <div style="margin-left: 4px">
                                                            <a href="{{route('teacher.pin',$item->id)}}" class="btn btn-info shadow btn-xs sharp " 
                                                                data-is-pinned="{{$item->pin}}"
                                                                id="pin"><i class="fa-solid fa-thumbtack"></i></a>
                
                                                        </div>
                                                    </div>												
                                                </td>	
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            @else
            <div class="mb-10 py-3">
                <h5 class=" text-danger">No Teachers</h5>

            </div>
            @endif
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <h3>{{$department->name}} Siense Courses</h3>


            <div class="d-flex m-3">
                <a href="{{route('course.create',$department->id)}}" class="btn btn-primary">Add Course </a>
            </div>
            @if (count($course)>0)
            <div class="row mt-8 mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List of Courses</h4>
                        </div>
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Level</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($course as $item)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td><a href="{{route('course.show',$item->id)}}">{{$item->name}}</a>
                                                <p><a href="{{route('course.show',$item->id)}}">{{$item->name_ku}}</a></p></td>
                                                <td><img src="{{asset('images/course/'.$item->image)}}" style="max-width:150px;max-height: 150px" class="img" alt=""></td>
                                                <td>{{$item->type}}</td>
                                                <td>{{$item->created_at}}</td>
            
                                                <td>
                                                    <div class="d-flex">
                                                    
                                                        <div style="margin-right: 4px">
                                                            <a href="{{route('course.destroy',$item->id)}}" class="btn btn-danger shadow btn-xs sharp " id="delete"><i class="fa fa-trash"></i></a>
                                                        </div>
            
                                                        <div >
                                                            <a href="{{route('course.edit',$item->id)}}" class="btn btn-warning shadow btn-xs sharp"><i class="fa fa-pen"></i></a>
                                                        </div>
                                                    </div>												
                                                </td>	
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            @else
            <div class="mb-10 py-3">
                <h5 class=" text-danger">No Course</h5>

            </div>
            @endif
        </div>
    </section>

@endsection
@section('datatablejs')
<script src="{{ asset('backend/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugin/datatables.init.js') }}"></script>
@endsection
@section('switalertjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('backend/assets/js/plugin/sweetalert.init.js')}}"></script>
@endsection

