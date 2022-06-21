<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <title>Profile</title>
</head>
<body>
    <div>
        @include('include.nav')
    </div>
    <div class="parent">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
        <div class="panel">
            <div class="team">
                @foreach ($userImage as $a )
                    @foreach ($uploadedImg as $i)
                        @if ($a->image==$i->image)
                            <div>
                                <img id="imaggg" src="{{asset('images/'.$i->image)}}">
                            </div>
                        @elseif ($a->image==NULL)
                            <div class='img'>
                                        
                                <span class='let'>{{$first}}</span>
                                <span class='let'>{{$second}}</span>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                
                
            </div>
            <div>
                <table>
                    <tr>
                        <td>
                            <b>Name</b>
                        </td>
                        <td>{{$user->firstName}} {{$user->lastName}}</td>
                    </tr>
                    <tr>
                        <td>
                            <b>Email</b>
                        </td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>
                            <b>Phone Number</b>
                        </td>
                        <td>{{$user->phoneNumber}}</td>
                    </tr>
                </table>
            </div>
            <div>
                <form action='{{route('profile')}}' method='post' enctype="multipart/form-data">
                    <div>
                        <div class="image">
                            <i class="fa fa-avatar"></i>
                            <img src="" alt=""  class="imagg">
                        </div>
                        <div class="imgBox">
                            <input type="file" name="image"  value="{{old('image')}}" onchange="displayImage()" class="@error('image') is-inavlid @enderror img"><br>
                            @error('image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    @csrf
                    <button type="submit" name="submit" class="btn">UPLOAD</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .parent{
            width: 100%;
            
        }
        table, tr, td{
            border: 1px solid black;
            border-collapse: collapse;
            
        }
        td, tr{
            padding: 10px;
        }
        .imgBox{
            width: 25% !important;
        }
        
        .image{
            width: 100px;
            height: 100px;
            border: 1px solid lightgrey;
            margin: 5px 0px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .imagg{
            width: 100%;
            height: 100%;
            border: 1px solid lightgrey;
        }

        .btn{
            background-color: lightseagreen;
            margin-top: 10px;
            color: white
        }
        .team{
            margin: auto;
            padding: 5px;
        }
        #imaggg{
            width: 50px;
            height: 50px;
            border-radius: 50%
        }
        .panel{
            border: 1px solid lightgray;
            width: 30%;
            padding: 10px;
            margin: 5px;
            margin-top: 10px !important;
            border-radius: 5px;
            margin: auto;
            box-shadow: 0px 2px 10px rgba(200, 208, 216, 0.3);
            animation: animatezoom 0.6s;
        }
        @keyframes animatezoom{
            from{
                transform: scale(0);
            }
            to{
                transform: scale(1);
            }
        }
        .let{
            font-size: 30px;
            color: white;
        }

        @media(max-width:760px){
            .panel{
                width:100%;
                margin: 0px !important;
                border-radius: 0px;
            }
            #imaggg{
                width: 60px;
                height: 60px;
                border-radius: 50%;
            }

        }
    </style>

    <script>
        document.querySelector('.imagg').style.display = "none";

        // TO DISPLAY IMAGE ONCHANGE
        function displayImage(){
            document.querySelector('.imagg').style.display = "inherit";
            let reader = new FileReader;
            let img = document.querySelector('.img').files[0];

            reader.onload=function(){
                document.querySelector('.imagg').src=reader.result;
            }
            reader.readAsDataURL(img);

        }
    </script>
</body>
</html>

