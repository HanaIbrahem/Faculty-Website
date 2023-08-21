@extends('admin.layout.master')

@section('datatablestyle')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('main')
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
                                <th>Description</th>
                                <th>Department</th>
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
                                    <p><a href="{{route('teacher.show',$item->id)}}">{{$item->name_ku}}</a></p></td>
                                    <td><img src="{{asset('images/teacher/'.$item->image)}}" style="max-width:150px;max-height: 150px" class="img" alt=""></td>
                                    <td>{!!$item->description!!}
                                    <p>{!!$item->description_ku!!}</p></td>
                                    <td>{{$item->department->name}}</td>
                                    <td>{{$item->created_at->format('d-m-y')}}</td>
                                    <td>{{$item->updated_at->format('d-m-y')}}</td>

                                    <td>
                                        <div class="d-flex">
                                        
                                            <div style="margin-right: 4px">
                                                <a href="{{route('teacher.destroy',$item->id)}}" class="btn btn-danger shadow btn-xs sharp " id="delete"><i class="fa fa-trash"></i></a>
                                            </div>

                                            <div >
                                                <a href="{{route('teacher.edit',$item->id)}}" class="btn btn-warning shadow btn-xs sharp"><i class="fa fa-pen"></i></a>
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



<section class="py-4">
    <div class="container">
        <h3>Add Teachers </h3>
        <div class="row justify-space-between py-2">
            @if (count($department) > 0)
              @foreach ($department as $item )
              <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
                <div class="card card-profile mt-md-0 mt-5">
                    <div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">
                        <a class="d-block blur-shadow-image">
                            <a href="{{route('department.show',$item->id)}}"><img src="{{asset('images/department/'.$item->image)}}" alt="{{$item->name}}}"
                                class="img-fluid w-100 border-radius-lg" style="max-height: 221px;max-width:348px">
                        </a>
                    </div>
                    <div class="card-body text-center">
                         <h4 class="mb-0"><a class="nav-link " href="{{route('department.show',$item->id)}}">{{$item->name}}</a></h4>
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-4 col-4">
                                <h5 class="text-primary mb-2">Add</h5>
                                <a href="{{route('teacher.create',$item->id)}}" class="btn btn-secondary"><i class="fa fa-plus"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              @endforeach

            @else
                <p class="text-center">NO Department</p>
            @endif

        </div>
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
