@extends('admin.layout.master')

@section('datatablestyle')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('main')
<div class="row mt-8 mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List of Activity</h4>
            </div>
            <div class="m-1 p-2">
                <a href="{{route('activity.create')}}" class="btn btn-primary">Post Activity</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Image</th>   
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($activity as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <a href="{{route('activity.show',$item->id)}}">{{$item->name}}</a>
                                        <a href="{{route('activity.show',$item->id)}}"><p>{{$item->name_ku}}</p></a>                        
                                    </td>
                                    <td><img src="{{asset('images/activity/'.$item->image)}}" style="max-width:150px;max-height: 150px" class="img" alt=""></td>
                                
                    
                                    <td>{{$item->created_at->format('d-m-y')}}</td>
                                    <td>{{$item->updated_at->format('d-m-y')}}</td>

                                    <td>
                                        <div class="d-flex">
                                        
                                            <div style="margin-right: 4px">
                                                <a href="{{route('activity.destroy',$item->id)}}" class="btn btn-danger shadow btn-xs sharp " id="delete"><i class="fa fa-trash"></i></a>
                                            </div>

                                            <div >
                                                <a href="{{route('activity.edit',$item->id)}}" class="btn btn-warning shadow btn-xs sharp"><i class="fa fa-pen"></i></a>
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


@endsection


@section('datatablejs')
<script src="{{ asset('backend/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugin/datatables.init.js') }}"></script>
@endsection

@section('switalertjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('backend/assets/js/plugin/sweetalert.init.js')}}"></script>
@endsection



