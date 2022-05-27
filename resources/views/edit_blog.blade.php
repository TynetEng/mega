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
    <div class="parent">
        <div class="panel">
            <div>
                @foreach ($check as $i)
                    <div class="fill">
                        <h3>{{$i->title}}</h3>
                        <p class='cont'>{{$i->content}}<span class='bit'>...read more</span></p>
                        <div>
                            <button onclick="editBlog({{$i}})">EDIT</button>
                        </div>
                    </div>
                @endforeach
            </div>    
        </div>
    </div>

    <style>
        .panel{
            padding: 2%;
        }
        .bit{
            font-weight: bold
        }
        .fill{
            padding-bottom: 10px;
        }
        /* .h3, a{
            color: black;
            text-decoration: none;
        } */
        @media(max-width:760px){
            .panel{
                margin: auto;
                padding:1% !important;
            }
            
        }
    </style>

    <script>
        function editBlog(params){
            window.location.href=`update/${params.id}`;
        }
    </script>
</body>
</html>

