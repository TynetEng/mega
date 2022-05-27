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
        <div class="team">
            @foreach ($userImage as $a )
                @foreach ($uploadedImg as $i)
                    @if ($a->image==$i->image)
                        <div>
                            <img id="image">
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
                <div class="imgBox">
                    <input type='file' name='image' value="{{old('image')}}" class="form-control @error('image') is-inavlid @enderror">
                </div>
                @error('image')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                @csrf
                <button type="submit" name="submit" class="btn">UPLOAD</button>
            </form>
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
        .btn{
            background-color: lightseagreen;
            margin-top: 10px;
            color: white
        }
        .team{
            margin: auto
        }
        #image{
            width: 50px;
            height: 50px;
            border-radius: 50%
        }

        .img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid lightgrey;
            background-color: lightseagreen;
            margin: auto;    
            margin-top: 1%;
        }
        .let{
            font-size: 30px;
            color: white;
        }
    </style>

    <!-- <script>
        function sum(){
            let nums = [5,10, 20];

            console.log(nums.sort()[1])
        }
        sum();
    </script> -->
</body>
</html>
<script>
    let userImage=@json($userImage);
    console.log(userImage);
    setTimeout(() => {
        document.getElementById('image').src=`{{url('storage/${userImage[0].image}')}}`
    }, 1000);
</script>
