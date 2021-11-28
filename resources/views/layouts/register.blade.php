<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--stylshhet ref bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--Css Style-->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <!--Scripts-->
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>
    <body>  
        <div id="register">
            
            <main class="py-4">
                    @yield('content')
            </main>
        </div>
    </body>
</html>