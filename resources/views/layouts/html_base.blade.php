<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--JQUERY:-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
    <!--LINKS O SCRIPTS PARTICULARES QUE SE NECESITEN SEGÚN LA VISTA:-->
    @yield('head')
    <!--LINK Y SCRIPT DE BOOTSTRAP:-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        /*para solucionar la superposición con el NAVBAR*/
        body {
            padding-top: 60px;
        }
    </style>
    <title>@yield('titulo')</title>
</head>
<body>
    <header>
        @include('layouts.navbar')
        @yield('header')
    </header>
    @yield('contenido')
</body>
</html>