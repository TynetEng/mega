<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div>
        @include('include.nav')
    </div>
    <div class="container">
        <div class="parent">
            <div class="panel">
                <div>
                    @foreach ($blog as $i)
                        <h2><a>{!! $i->title !!}</a></h2>
                        <p>{!! $i->content !!}</p>
                    @endforeach
                </div>   
            </div>
        </div>    
    </div>
    <style>
        .panel{
            padding: 2%;
        }
        html, body {
            margin: 0px !important;
            padding: 0px !important;
            padding-top: 0px !important;
            width: 100% !important;
        }
        .parent{
            width:100% !important;
        }
        @media(max-width:760px){
            .panel{
                margin: auto;
                padding:0px !important;
            }
            
        }
    </style>
</body>
</html>

