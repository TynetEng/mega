<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
         <script src="//unpkg.com/alpinejs" defer></script>
        <!-- Styles -->
        
        <link rel="stylesheet" href="style.css">
        <style>
            /* body {
                font-family: 'Nunito', sans-serif;
            } */
        </style>
    </head>
    <body>
        <div>
            @include('include.nav')
        </div>
        <div class="parent">
            <div class="headie">
                <h2>DASHBOARD</h2>
                <div class='team'>
                    <div class='img'>
                        
                        <span class='let'>{{$first}}</span>
                        <span class='let'>{{$second}}</span>
                    </div>
                </div>
            </div>
               
            <footer>
                <h5>Tynet Empire</h5>
            </footer>
        </div>

        <style>
            html, body {
                margin: 0px !important;
                padding: 0px !important;
                padding-top: 0px !important;
            }

            .img{
                width: 50px;
                height: 50px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                border: 1px solid lightgrey;
                background-color: teal;
                margin: auto;    
            }
            .let{
                font-size: 30px;
                color: white;
            }
            .parent, html {
                width: 100%;
                padding: 0px !important;
            }
            .parent .headie, html .headie {
                width: 100%;
                padding: 0px !important;
                margin: 0px !important;
                padding-top: 70px !important;
            }
            .parent .headie h2, .parent .headie h3, html .headie h1, html .headie h3 {
                text-align: center;
            }

        </style>
    </body>
</html>
