
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MEGA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <script src="//unpkg.com/alpinejs" defer></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Styles -->
        
        <link rel="stylesheet" href="{{asset('image/mega.png')}}">
        <link rel="stylesheet" href="style.css">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
<body>
    <nav>
        <div class="parent">
            <div class="header shadow-sm">
                <div class="navbar navbar-expand-sm container">
                    <div class="pro">
                        <div class="left">
                            <a href="#" class="navbar-brand">
                                <img src="./image/mega2.png" alt="">
                            </a>
    
                            <button class="navbar-toggler bell"  id="openSideBar">
                                <i class="fa fa-bars bar"></i>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="menu">
                            <div class="inp">
                                <i class="fa fa-search"></i>
                                <input type="text" placeholder="Search" class="inpt">
                            </div>
                            <div class="show">
                                <ul class="navbar-nav">
                                    <li class="nav-items">
                                        <a href="/dashboard" class="nav-link">
                                            DASHBOARD
                                        </a>
                                    </li>
                                    <li class="nav-items">
                                        <a href="/blog" class="nav-link">
                                            BLOG 
                                        </a>
                                    </li>
                                    <li class="nav-items">
                                        <a href="/blog_post" class="nav-link">
                                            BLOG POST
                                        </a>
                                    </li>
                                    <li class="nav-items">
                                        <a href="/edit_blog" class="nav-link">
                                            EDIT BLOG
                                        </a>
                                    </li>
                                    <li class="nav-items drop">
                                        <a href="#" class="nav-link">
                                            MY ACCOUNT
                                        </a>
                                        <div class="ex">
                                            <div class="tin">
                                                <a href="/index">
                                                    SIGNUP
                                                </a>
                                            </div>
                                            <div class="tin">
                                                <a href="/login">
                                                    LOGIN
                                                </a>
                                            </div>
                                            <div class="tin">
                                                <a href="/profile">
                                                    PROFILE
                                                </a>
                                            </div>
                                            <div class="tin">
                                                <a href="{{route('logout')}}" class="d-flex justify-content-center">
                                                    <div>
                                                        <i class="fa fa-sign-out"></i>
                                                    </div>
                                                    <div class="exp">
                                                        <span>LOGOUT</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="tin2">SETTINGS</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="sideBar">
                        <ul class="navbar-nav">
                            <li class="nav-items">
                                <a href="{{url('dashboard')}}" class="justify-content-center d-flex">
                                    <div>
                                        <i class="fa fa-delicious"></i>
                                    </div>
                                    <div class="exp">
                                        <span>DASHBOARD</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="{{url('profile')}}" class="justify-content-center d-flex">
                                    <div>
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <div class="exp">
                                        <span>PROFILE</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="{{url('blog')}}" class="justify-content-center d-flex">
                                    <div>
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <div class="exp">
                                        <span>BLOG</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="{{url('blog_post')}}" class="justify-content-center d-flex">
                                    <div>
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <div class="exp">
                                        <span>BLOG POST</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="{{url('edit_blog')}}" class="justify-content-center d-flex">
                                    <div>
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <div class="exp">
                                        <span>EDIT BLOG</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="{{url('signup')}}" class="justify-content-center d-flex">
                                    <div>
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <div class="exp">
                                        <span>SIGNUP</span>
                                    </div>
                                </a>
                            </li>
                            <div>
                                <i class="fa fa-search"></i>
                            </div>
                            <li class="nav-items">
                                <a href="{{url('login')}}" class="justify-content-center d-flex">
                                    <div>
                                        <i class="fa fa-sign-in"></i>
                                    </div>
                                    <div class="exp">
                                        <span>LOGIN</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="{{route('logout')}}" class="justify-content-center d-flex">
                                    <div>
                                        <i class="fa fa-sign-out"></i>
                                    </div>
                                    <div class="exp">
                                        <span>LOGOUT</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="{{url('')}}" class="justify-content-center d-flex">
                                    <div>
                                        <i class="fa fa-cog"></i>
                                    </div>
                                    <div class="exp">
                                        <span>SETTINGS</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
       $(document).ready(function(){
            $('.sideBar').hide()
            $('#openSideBar').click(function(){
                $('.sideBar').toggle()   
            })
       })
    </script>
</body>
</html>

<style>
    html,body{ 
        margin: 0px;
    }
    nav{
        width: 100%;
        margin: 0 !important;
        padding: 0;
        align-items: center;
    }
    .header{
        position: fixed;
        width: 100%;
        z-index: 100;
        background-color: white;
        border-bottom: 3px solid #0B6E6E;
    }
    .inp{
        background-color: rgb(240, 236, 236);
        padding: 0px 5px;
        border-radius: 5px;
        display: flex;
        align-items: center;
    }
    input{
        border: none;
        padding: 2px 5px;
        outline: none !important;
        background-color: transparent;
        font-size: 15px;
    }
    input::placeholder{
        color: black;
    }
    
    .show a{
        color: #0B6E6E;
        font-weight: bold;

    }
    .show a:hover{
        color: rgb(226, 223, 223);
    }
    .sideBar{
        display: none;
    }
   .navbar-nav{
        display: flex;
        align-items: center;
    }
    .pro{
        width: 100% !important;
        padding: 0px;
        margin: 0px;
        display: flex;
        align-items: center;
        justify-content: space-around !important;
    }
    .ex{
        background-color: white;
        border-radius: 3%;
        width: 18% !important;
        padding: 0% 2%;
        line-height: 3.0;
        padding-top: 5px;
        padding-bottom: 5px;
        height: 240px;
        position: absolute ;
        border: 1px solid lightgray;
        z-index: 100;
        box-shadow: 1px 1px 1px  black;
        display: none;
    }
    .tin{
        border-bottom: 1px solid lightgray;
        font-weight: bold;
        text-align: center;
    }
    .tin a{
        color: black;
        text-decoration: none;
    }
    img{
        width: 30%;    
    }
    .tin2{
        font-weight: bold;
        text-align: center;
    }
    .drop:hover .ex{
        display: inherit;
    }

    @media(max-width:1040px){
        .collapse{
            margin-left: -120px;
        }
    }

    @media(max-width:1020px){
        .show{
            margin-left: -200px !important;
        }
        .inp{
            display: none;
        }
    }


    @media(max-width:760px){
        nav{
            margin-top: -10px !important;
            width: 100% !important;
        }
        .sideBar{
            background: white;
            top: 0;
            left: -3% !important;
            width: 55%;
            height: 100vh;
            position: absolute !important;
            z-index: 1000;
            box-shadow: 0px 0px 2px black;
            padding: 4% 6%;
            font-size: 17px;
            line-height: 2.5;
            overflow-y: scroll;
        }
        ul{
            padding-left: -3% !important;
        }
        .sideBar a{
            color: #0B6E6E;
        }
        .bar{
            color: #0B6E6E;
        }
        .left{
            display: flex;
            justify-content: space-between !important;
            align-items: center;
            width: 100% !important;
        }
        .tel{
            display: none;
        }
        .bar:focus{
            border: 2px solid red !important;
            border-radius: 1%;
            transform: rotate(180deg);
            transform: 0.5s;
        }
        
        .collapse{
            display: none;
        }
        nav{
            width: 100% !important;
        }
        #openSideBar{
            border: 0 !important;
            outline: 0 !important;
        }
        img{
            width: 20% !important;
        }
        a{
            display: flex;
            text-decoration: none;
        }
        
    }
</style>