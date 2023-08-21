@php
    $info = [];
        $faculty = \App\Models\Faculty::find(1);

        if (Session::get('locale') == 'ku') {
            $info = [
                'name' => $faculty->name_ku,
                'title'=>$faculty->title_ku,
            ];
        }
        else {
            $info = [
                'name' => $faculty->name,
                'title'=>$faculty->title,
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

    @else
    
    @endif


    <link rel="icon" type="image/x-icon" href="{{asset('images/'.$faculty->logo)}}">
    <title>{{$info['name']}}</title>
</head>

<body>

    @include('frontend.layout.header')

    @yield('main')

    @include('frontend.layout.footer')
    
</body>

</html>
