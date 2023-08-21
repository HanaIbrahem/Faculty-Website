@extends('admin.layout.master')
{{-- css --}}
@section('datatablestyle')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
@endsection

{{-- content --}}
@section('main')
    <div class="row mt-8 mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List of Users</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($alluser as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{!!$item->email!!}</td>
                                        <td>{{$item->role}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>

                                        <td>
                                            <div class="d-flex">
                                                @if ($item->role =='admin')
                                                <a href="{{route('User-delete',$item->id)}}" class="btn btn-danger shadow btn-xs sharp" id="delete"><i class="fa fa-trash"></i></a>
                                                {{-- <a href="{{route('User-edit',$item->id)}}" class="btn btn-info shadow btn-xs sharp ms-2" ><i class="fa fa-pen"></i></a> --}}
                                                @endif
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

    <div class="row mt-4 ">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header py-3">
                    <h4 class="card-title">Admin Register</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                    
                            <!-- Name -->
                            <div class="form-group mb-3 mt-2 ">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="mt-1 block w-full form-control input-rounded" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                    
                            <!-- Email Address -->
                            <div class="form-group mb-3 mt-2 ">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="mt-1 block w-full form-control input-rounded" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                    
                            <!-- Password -->
                            <div class="form-group mb-3 mt-2 ">
                                <x-input-label for="password" :value="__('Password')" />
                    
                                <x-text-input id="password" class="mt-1 block w-full form-control input-rounded"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                    
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                    
                            <!-- Confirm Password -->
                            <div class="form-group mb-3 mt-2 ">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    
                                <x-text-input id="password_confirmation" class="mt-1 block w-full form-control input-rounded"
                                                type="password"
                                                name="password_confirmation" required autocomplete="new-password" />
                    
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                    
                            <div class="form-group mb-3 mt-2 ">    
                                <x-primary-button class="btn btn-primary ml-4">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- js --}}
@section('datatablejs')
    <script src="{{ asset('backend/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugin/datatables.init.js') }}"></script>
@endsection
