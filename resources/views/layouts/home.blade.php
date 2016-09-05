<html>
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')"/>
        <meta name="keywords" content="@yield('keywords')"/>
       
        <link rel='stylesheet' type='text/css' href="{{URL::to('bootstrap/css/bootstrap.min.css')}}"/>
        <script type='text/javascript' src="{{URL::to('/bootstrap/js/jquery.js')}}"></script>
        <script type='text/javascript' src="{{URL::to('/bootstrap/js/bootstrap.min.js')}}"></script>
        
        
        
        
        
    </head>
    <body>
        <div class="container">
            @yield('content')
            
        </div>
    
    </body>
        
</html>>