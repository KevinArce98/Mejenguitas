<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Oxygen|Signika" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Signika', sans-serif;
                font-weight: 100;

            }

            .full-height {
                margin-top: 250px;
                margin-bottom: 15px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
                padding: 20px;
            }
            #boton{
                text-decoration: none;
                color: black !important;
                font-size: 1.5em;
                width: 100% !important;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="full-height">
                    <div class="content">
                        <div class="title">
                          @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                   <div class="col-sm-5 col-md-offset-3">
                        <a href="{{ route('home') }}" class="btn btn-default text-center" id="boton">Volver a la página de inicio</a>
                   </div>
            </div>
        </div>
        
    </body>
</html>
