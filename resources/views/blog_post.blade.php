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
            @foreach ( $blogs as $blog )
                <div class='fill'>
                    <div class='blog'>
                        
                        @if ($blog->user_id ==$poster)
                            <h6>{{auth()->user()->firstName}}</h6>
                        @endif

                    <div> 
                    <div>
                        <h3><a href=single_post?blog_id={{$blog->id}}&title={{$blog->title}}>{{$blog->title}}</a></h3>
                        <p class='cont'>{{$blog->content}}<span class='bit'>...read more</span></p>
                    </div>
                </div>
            
            @endforeach
        </div>
    </div>

    <style>
        html, body {
            margin: 0px !important;
            padding: 0px !important;
            padding-top: 0px !important;
            width: 100% !important;
        }
        .parent{
            width:100% !important;
        }
        .parent .panel {
            display: block;
            margin: 1% 3%;
        }
        .parent .panel .title {
            font-weight: bold;
        }
        .parent .panel .ft {
            display: flex;
            justify-content: space-between;
        }
        .blog{
            padding-bottom: 30px;
        }
        h6{
            font-weight: bold;
        }
        h3 a{
            color: black !important;
            
        }
        .bit{
            font-weight: bold;
        }
        

        @media(max-width:760px){
            .parent {
                width: 100%;   
            }
            
            .fill{
                width: 100% !important;
            }
            .parent .panel {
                display: block;
                margin: 1% 2%;
            }
            h3 a{
                font-size: 18px !important;
                
            }
        }

    </style>
</body>
</html>
<script>
    let blog=@json($blogs);
    console.log(blogs);
</script>
