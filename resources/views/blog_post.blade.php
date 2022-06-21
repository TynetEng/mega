<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <title>Blogs</title>
</head>
<body>
    <div>
        @include('include.nav')
    </div>
    <div class="container">
        <div class="parent">
            <div class="panel">
                @foreach ( $blogs as $blog )
                    <div class='fill'>
                        <div>
                            <h3><a href=single_post?blog_id={{$blog->id}}&title={{$blog->title}}>{{$blog->title}}</a></h3>
                            <p class='cont'>{!! \Str::limit($blog->content, 100) !!}
                                <span class='bit'>
                                    <a href=single_post?blog_id={{$blog->id}}&title={{$blog->title}}>read more </a>
                                </span>
                            </p>
                        </div>
                        <div class='blog'>
                            @foreach ($show as $i)
                                @if ($blog->user_id == $i->id)
                                    <p class="d-flex align-items-center"> 
                                        <span class="own">Blog:</span>
                                        <span class="displayName">{{$i->firstName}} {{$i->lastName}}</span>
                                        <span class="px-2 displayTime"><i>{{$blog->time}}</i></span>
                                    </p>
                                @endif
                            @endforeach
                            <p>
                                <span class="own">Views:</span>
                                <span>{{$blog->view}}</span>
                            </p>
                        <div>
                        <div class="und"></div>
                    </div>
                
                @endforeach
            </div>
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
            width: 100% !important;
            z-index: -10;
        }
        .parent .panel {
            display: block;
            margin: 0% 3%;
            padding-top: 70px !important;
        }
        .parent .panel .title {
            font-weight: bold;
        }
        .parent .panel .ft {
            display: flex;
            justify-content: space-between;
        }
        .own{
            font-weight: bold;
        }
        .blog{  
            padding-top: 3px;
        }
        h6{
            font-weight: bold;
        }
        h3 a{
            color: black !important;
            
        }
        .fill{
            padding-top: 5px;
            padding-bottom: -10px;
        }
        .displayName{
            font-weight: bold;
            font-size: 16px;
        }
        .cont{
            width: 100%;
        }
        .bit a{
            font-weight: bold;
            text-decoration: none;
            color: black;
        }

        .und{
            border-bottom: 3px double teal;
            
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

