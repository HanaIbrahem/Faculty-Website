@extends('frontend.layout.master')

@section('main')
    
<div class="container">
    <div class="row">
        <h1>{{ __('message.welcome') }}</h1>
        <a class="" href="{{ route('setlocale', 'en') }}">English</a>
        <a class="" href="{{ route('setlocale', 'ku') }}">Kurdish</a>
    </div>
</div>
@endsection
