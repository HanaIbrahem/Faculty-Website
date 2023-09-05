@php
    $info = [];
    $faculty = \App\Models\Faculty::find(1);
    
    if (Session::get('locale') == 'ku') {
        $info = [
            'name' => $faculty->name_ku,
            'title' => $faculty->title_ku,
        ];
    } else {
        $info = [
            'name' => $faculty->name,
            'title' => $faculty->title,
        ];
    }
@endphp

<!DOCTYPE html>
{{-- if language is kurdish --}}
@if (Session::get('locale') == 'ku')
    <html lang="ku" dir="rtl">
@else
    <html lang="en" dir="ltr">
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- style for kurdish --}}
    @if (Session::get('locale') == 'ku')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    @else

    @endif
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/material-kit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    <!-- Font ausom link -->
    <link rel="stylesheet" href="{{asset('backend/assets/fonts/css/all.min.css')}}">
    {{-- <script src="https://kit.fontawesome.com/8b87d80512.js" crossorigin="anonymous"></script> --}}


    <link rel="icon" type="image/x-icon" href="{{ asset('images/' . $faculty->logo) }}">
    <title>{{ $info['name'] }}</title>
</head>

<body>

    <header>
        @include('frontend.layout.header')
        <div class="page-header min-vh-75" style="background-image: url({{ asset('frontend/assets/img/cover.png') }})"
            loading="lazy">
            <span class="mask bg-gradient-dark opacity-2"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-white text-center">
                        <h2 class="text-white">Soran University Faculty of Scince</h2>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, doloremque.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <main>
    @yield('main')
    </main>
    @include('frontend.layout.footer')



    {{-- required scrypts --}}
    <script src="{{asset('frontend/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/core/bootstrap.min.js')}}"></script>
</body>

</html>
