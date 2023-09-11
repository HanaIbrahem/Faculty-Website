@php
    $faculty = \App\Models\Faculty::find(1);
    $loc=''; 
    if (Session::get('locale') == 'ku') {
      $loc='_ku';
    } 
@endphp

<!DOCTYPE html>
{{-- if language is kurdish --}}
@if ($loc=='_ku')
    <html lang="ku" dir="rtl">
@else
    <html lang="en" dir="ltr">
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- style for kurdish --}}
    @if ($loc=='_ku')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    
            <link rel="stylesheet" href="{{asset('frontend/assets/css/kurdish-style.css')}}">
    @else

    @endif
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/material-kit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    <!-- Font ausom link -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/css/all.min.css')}}">
    {{-- <script src="https://kit.fontawesome.com/8b87d80512.js" crossorigin="anonymous"></script> --}}


    <link rel="icon" type="image/x-icon" href="{{ asset('images/' . $faculty->logo) }}">
    <title>{{ $faculty->{"title$loc"}  }}</title>
</head>

<body class="index-page ">
    @include('frontend.layout.header')
 
    @yield('main')

    @include('frontend.layout.footer')



    {{-- required scrypts --}}
    <script src="{{asset('frontend/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/core/bootstrap.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/validate.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jqury/jqury.js')}}"></script>

</body>

</html>
