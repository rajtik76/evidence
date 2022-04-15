<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>
@include('alert')
@yield('signed-content')

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
