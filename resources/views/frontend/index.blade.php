@extends('frontend.layout.master')

@section('main')
    
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ __('Language') }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('setlocale', 'en') }}">English</a>
            <a class="dropdown-item" href="{{ route('setlocale', 'ku') }}">Kurdish</a>
        </div>
    </li>
</ul>
<h1>{{ __('message.welcome') }}</h1>
@endsection