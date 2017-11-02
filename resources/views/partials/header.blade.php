<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ url('js/jquery.min.js') }}"></script>
    {{--  <script src="{{ url('js/bootstrap.min.js') }}"></script>  --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>

<body>
    <div class="container">
        <header style="height:50px; background-color:red;padding:20px;">
            <h2> This is header</h2>
        </header>

        {{--  <section style="height:300px; background-color:white;padding:20px;">
            <h2>This content</h2>
        </section>  --}}