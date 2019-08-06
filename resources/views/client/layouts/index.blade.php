<!DOCTYPE html>
<html>
    <head>
        <title>
            @isset ($title)
                {{ $title }}
            @endisset
        </title>
        <base href="{{ asset('/')}}" />
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/font/fontawesome-free-5.10.0-web/css/all.css') }}" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" crossorigin="anonymous">
        <script src="{{ asset('/js/jquery-3.4.1.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/client.js') }}"></script>
    </head>
    <body>
        @include("client.layouts.header")
        @yield("content")
        @include("client.layouts.footer")
    </body>
</html>
