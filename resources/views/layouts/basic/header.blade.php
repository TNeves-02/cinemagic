<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
       {{ config('app.name')}}
    </title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="{{ asset('js/app.js') }}"></script>

</head>


