@extends('admin.layout.master')

@section('datatablestyle')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
@endsection


@section('main')
<div class="row">
    <div class="col-lg-4 py-2">
        <div class="card text-white bg-primary p-2">
            <div class="card-header">
                <h5 class="card-title text-white">Departments</h5>
            </div>
            <div class="card-body mb-0">
                <p class="card-text">Faculty of Scienece Departments</p>
                <a href="{{route('department.index')}}" class="btn bg-white text-dark btn-card">Departments</a>
            </div>
            <div class="card-footer bg-transparent border-0 text-white">Number of Departments: 12
            </div>
        </div>
    </div>

    <div class="col-lg-4 py-2">
        <div class="card text-white bg-secondary p-2">
            <div class="card-header">
                <h5 class="card-title text-white">Admins</h5>
            </div>
            <div class="card-body mb-0">
                <p class="card-text">Faculty of Scienece Admins</p>
                <a href="{{route('Users-list')}}" class="btn bg-white text-dark btn-card">Admins</a>
            </div>
            <div class="card-footer bg-transparent border-0 text-white">Number of admins: 12
            </div>
        </div>
    </div>

    <div class="col-lg-4 py-2">
        <div class="card text-white bg-light p-2">
            <div class="card-header">
                <h5 class="card-title text-primary">Teachers</h5>
            </div>
            <div class="card-body mb-0">
                <p class="card-text text-primary">Faculty of Scienece Teachers</p>
                <a href="{{route('teacher.index')}}" class="btn bg-primary text-white btn-card">Teachers</a>
            </div>
            <div class="card-footer bg-transparent border-0 text-primary">Number of Teachers: 12
            </div>
        </div>
    </div>
</div>

<div class="row py-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contact List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mmessage</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            {{-- @foreach ($teachers as $item)
                                <tr>
                                    <td>{{$i++}}</td>>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email }}</td>
                                    <td>{{$item->message}}</td>
                                    <td>{{$item->created_at->format('d-m-y')}}</td>
                                </tr>
                            @endforeach --}}
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