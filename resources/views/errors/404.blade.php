<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Page Not Found</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                margin-top: 250px;
                margin-bottom: 15px;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
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
                <div class="flex-center position-ref full-height">
                    <div class="content">
                        <div class="title">
                            Lo sentimos, la página que está buscando no se pudo encontrar.</div>
                    </div>
                </div>
            </div>
            <div class="row center-block">
                    <a href="{{ route('/') }}" class="btn btn-default text-center" id="boton">Volver a la pagina de inicio</a>
            </div>
        </div>
        
    </body>
</html>
