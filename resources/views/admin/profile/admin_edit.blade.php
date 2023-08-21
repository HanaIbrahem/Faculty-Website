@extends('admin.layout.master')

@section('main')

<div class="col-xl-6 col-lg-6">
    <div class="card">
        <div class="card-header py-3">
            <h4 class="card-title">Update Admin Information</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="POST" action="{{route('User-update')}}">
                    @csrf
            
                    @method('POST')
                    <!-- Name -->
                    <div class="form-group mb-3 mt-2 ">
                        <x-input-label for="name" :value="__('Name')" />
                        <input id="name" value="{{$user->name}}" class="mt-1 block w-full form-control input-rounded" type="text" name="name" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
            
                    <!-- Email Address -->
                    <div class="form-group mb-3 mt-2 ">
                        <x-input-label for="email" :value="__('Email')" />
                        <input value="{{$user->email}}" id="email" class="mt-1 block w-full form-control input-rounded" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="form-group mb-3 mt-2 ">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <input id="password" class="mt-1 block w-full form-control input-rounded"
                                        type="text"
                                        name="password"
                                        required autocomplete="new-password"  value=""/>
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="form-group mb-3 mt-2 ">
                        <x-input-label for="password" :value="__('Confirm Password')" />
            
                        <x-text-input id="password_confirmation" name="password_confirmation" 
                        type="password" class="mt-1 block w-full form-control input-rounded mt-1 block w-full" autocomplete="new-password" />

            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
            
                    <div class="form-group mb-3 mt-2 ">    
                        <x-primary-button class="btn btn-primary ml-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
