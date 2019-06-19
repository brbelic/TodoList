<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Todo list using Laravel</title>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
           
           <div class="col-4 offset-4">
               <h2>Todo list using Laravel</h2>
           </div>
           
            <div class="navbar navbar-default">
                <!-- navbar items -->
            </div>
            
            @yield('content')    
        </div>

    </body>
</html>
