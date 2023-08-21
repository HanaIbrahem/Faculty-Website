<!DOCTYPE html>
{{-- if language is kurdish --}}
@if (Session::get('locale') == 'ku')
<html lang="ku">
@else
<html lang="en">
@endif

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- style for kurdish --}}
    @if (Session::get('locale') == 'ku')

    @else

    @endif

    <title></title>
</head>

<body>

    @yield('main')
    
</body>

</html>
