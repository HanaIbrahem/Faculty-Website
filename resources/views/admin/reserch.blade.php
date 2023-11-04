@extends('admin.layout.master')

@section('datatablestyle')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
@endsection


@section('main')

<div class="row mt-8 mb-4">
    <div class="col-12">
        <div class="card">
                
            <div class="card-header">
                <h4 class="card-title">List of Researchs</h4>
            </div>
            <div class="card-body">
                <h4 class="card-title">Post New Research</h4>
                <a href="{{route('research.create')}}" class="rounded btn btn-primary mb-4 ps-4 pe-4">Post</a>

                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Auther</th>
                                <th>File</th>
                                <th>Department</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($research as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                    <a href="{{route('research.show',$item->id)}}">{{$item->name}}</a>
                                    <a href="{{route('research.show',$item->id)}}"> <p>{{$item->name_ku}}</p></a>

                                    
                                   
                                    </td>
                                    <td><img src="{{asset('images/research/'.$item->image)}}" style="max-width:150px;max-height: 150px" class="img" alt=""></td>
                                    
                                    <td>{{$item->auther}}
                                    <p>{{$item->auther_ku}}</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('research.download', ['filename' => $item->file]) }}" download>{{$item->name}}</a>
                                    </td>
                                    <td>
                                        {{$item->department->name}}
                                    </td>
                                    <td>{{$item->created_at->format('d-m-y')}}</td>
                                    <td>{{$item->updated_at->format('d-m-y')}}</td>

                                    <td>
                                        <div class="d-flex">
                                        
                                            <div style="margin-right: 4px">
                                                <a href="{{route('research.destroy',$item->id)}}" class="btn btn-danger shadow btn-xs sharp " id="delete"><i class="fa fa-trash"></i></a>
                                            </div>

                                            <div >
                                                <a href="{{route('research.edit',$item->id)}}" class="btn btn-warning shadow btn-xs sharp"><i class="fa fa-pen"></i></a>
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

{{-- required vendors --}}
@section('datatablejs')
<script src="{{ asset('backend/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugin/datatables.init.js') }}"></script>
@endsection

@section('switalertjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('backend/assets/js/plugin/sweetalert.init.js')}}"></script>
@endsection
