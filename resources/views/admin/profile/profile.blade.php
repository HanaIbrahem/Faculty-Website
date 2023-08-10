@extends('admin.layout.master')
@section('main')

<div class="col-xl-6">
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title">{{auth()->user()->name}}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">Last updated {{auth()->user()->created_at->format('d-m-y')}} ago</p>
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-6">
    <div class="card">
        <div class="card-header py-3">
            <h4 class="card-title">Update Password</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
            
                    <div class="form-group mb-3 mt-2 ">
                        <x-input-label for="current_password" :value="__('Current Password')" />
                        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full form-control input-rounded" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-danger mt-2" />
                    </div>
            
                    <div class="form-group mb--3 mt-2">
                        <x-input-label for="password" :value="__('New Password')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full form-control input-rounded" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="text-danger mt-2" />
                    </div>
            
                    <div class="form-group mb-3 mt-2">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control input-rounded mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-danger mt-2" />
                    </div>
            
                    <div class="flex items-center gap-4 form-group">
                        <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
            
                        @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class=""
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection