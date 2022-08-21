<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Post</title>
</head>
<body>
    
    <div>
        @include('include.nav')
    </div>
    <div class="container">
        <div class="parentt">
            <div class="panel">
                @foreach ($blog as $i)
                    <div class="disk">
                        <button onclick="listBlog()">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                        <h2>{!! $i->title !!}</h2>
                    </div>
                    <p class="con">{!! $i->content !!}</p>
                @endforeach
            </div>
            
        </div>
    </div>

    <style>
        .parentt{
            padding-top: 80px;
        }
        .fa{
            display: none;
        }
        button{
            border: 0;
            background-color: transparent;
        }
        
        @media(max-width:1020px){
            .fa{
                display: inherit;
            }
            .disk{
                display: flex;
                align-items: center;
            }
            h2{
                padding-top: 10px;
                padding-left: 5px;
            }
            .con{
                font-size: 20px;
            }
        }

        @media(max-width:760px){
            .parentt{
                padding-top: 60px;
            }
            .disk{
                display: flex;
                align-items: center;
            }
            h2{
                font-size: 16px;
                font-weight: bold;
                padding-top: 10px;
                padding-left: 5px;
            }
            .con{
                font-size: 12px;
            }
            .fa{
                display: inherit;
            }
        }
    </style>

    <script>
        function listBlog(){
            window.location.href='../blog_post';
            window.onload= '../blog_post';
        }
    </script>
</body>
</html>