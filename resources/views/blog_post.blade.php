<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Blogs</title>
</head>
<body>
    <div>
        @include('include.nav')
    </div>
    <div class="container">
        <div class="parent">
            <div class="parentt">
                <div class="" style="margin-top: 50px">
                    <form action="/search/query" method="GET">
                        @csrf
                        <div class="inpp">
                            <div class="inpt">
                                <i class="fa fa-search"></i>
                                <input type="text" placeholder="Search..." class="" name="search">
                            </div>
                            <button type="submit" class=""> search</button>
                        </div>
                    </form>
                </div>
                <div class="panel">
                    @foreach ( $blogs as $blog )
                        <div class='fill'>
                            <div class="part">
                                <div class="bot">
                                    <div class="bee">
                                        <h3><a href=single_post?blog_id={{$blog->id}}&title={{$blog->title}}>{{$blog->title}}</a></h3>
                                        <p class='cont'> {{  \Str::limit(strip_tags($blog->content), 100) }} 
                                            <span class='bit'>
                                                <a href=single_post?blog_id={{$blog->id}}&title={{$blog->title}}>read more </a>
                                            </span>
                                        </p>
                                    </div>
                                    <div class='blog'>
                                        @foreach ($show as $i)
                                            @if ($blog->user_id == $i->id)
                                                <p class="blogGroup"> 
                                                    <span class="own">Blog:  </span>
                                                    <span class="displayName">{{ $i->firstName}} {{$i->lastName}}</span>
                                                    <span class="px-2 displayTime"><i>{{$blog->time}}</i></span>
                                                </p>
                                            @endif
                                        @endforeach
                                        <p>
                                            <span class="own">Views:</span>
                                            <span>{{$blog->view}}</span>
                                        </p>
                                    <div>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                </div>
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
        .parentt{
            padding-top: 40px;
        }
        .inpp{
            display: flex !important;
            width: 100%;
            margin-left: 0px;
            margin-bottom: 10px;
        }
        .inpt{
            width: 20% !important;
            display: flex;
            align-items: center;
            background-color: rgb(240, 236, 236);
            padding: 0px 5px;
            border-radius: 5px;
        }
        .inpt input{
            width: 100%;
            border: none;
            padding: 2px 5px;
            outline: none !important;
            background-color: transparent;
            font-size: 15px;
        }
        .inpp button{
            margin-left: 10px;
            background-color: #0B6E6E;
            color: white;
            border: none;
            border-radius: 5px;
            text-transform: uppercase;
            font-size: 15px;
            padding: 2px 10px;
        }
        /* .panel{
            padding-top: 20px !important;
            padding: 10px 0px;
            /* display: flex; */
            /* column-count: 2; */
            flex-wrap: wrap;
            
        } */
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
        .blogGroup{
            display: flex;
            align-items: center;
        }
        h6{
            font-weight: bold;
        }
        h3 a{
            color: black !important;
            
        }
        .fill{
            background-color: red;
            display: flex;
            flex-wrap: wrap;
        }
        .bot{
            box-shadow: 1px 1px 5px 1px lightgray;
            height: 200px;
            min-height: 200px !important;
            max-height: 200px !important;
            padding: 10px;
            margin-bottom: 10px;
            width: 40%;
        }
        .bot:hover{
            box-shadow: 2px 2px 4px 3px lightgray;
        }
        /* .part{
            height: 100%;
        } */
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

       
        
        @media(max-width:1020px){
            .blogGroup{
                display: block !important;
            }
            .bot{
                min-height: 250px !important;
            }
        }

        @media(max-width:760px){
            .parent {
                width: 100%;   
            }
            .inpp{
                margin-left: 5px !important;
            }
            .inpt{
                width: 70% !important;
            }
            
            .fill{
                width: 100% !important;
            }
            .parent .panel {
                display: flex;
                column-count: 0;
                margin: 1% 2%;
            }
            .bot{
                min-height: 300px !important;
            }
            .blogGroup{
                display: block;
            }
        }

    </style>
</body>
</html>

