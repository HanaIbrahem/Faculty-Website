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


<div class="col-xl-6 col-lg-6">
    <div class="card">
        <div class="card-header py-3">
            <h4 class="card-title">Update Email</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                
                    <div class="form-group mb-3 mt-2 ">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full form-control input-rounded mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                
                    <div class="form-group mb-3 mt-2 ">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full form-control input-rounded mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800">
                                    {{ __('Your email address is unverified.') }}
                
                                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>
                
                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                
                    <div class="flex items-center gap-4">
                        <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
                
                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection