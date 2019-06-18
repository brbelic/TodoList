<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Todo list using Laravel</title>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-default">

            </div>
        </div>

        @yield('content')
    </body>
</html>
