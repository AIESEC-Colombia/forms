<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>forms</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montaga|Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

    </head>

    <body>
    @yield('content')
    </body>
</html>


<script src="{{asset('js/app.js')}}"></script>

@yield('javascript')