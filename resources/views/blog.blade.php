<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Write Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="//unpkg.com/alpinejs" defer></script>
        <!-- Styles -->
        
        <link rel="stylesheet" href="style.css">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div>
            @include('include.nav')
        </div>
        <div class="parent">
            <div>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <div>
                @if($su=Session::get('error'))
                    <div class="alert alert-danger  alert-dismissible fade show d-flex justify-content-between"  role="alert">
                        <strong>{{$su}}</strong>
                        <button type="button" class="close border-0" data-dismiss="alert" aria-label="Close" style="background-color: transparent">
                            <span aria-hidden="true" style="font-weight: bolder">×</span>
                        </button>
                    </div>
                @endif 
            </div>
            <div class="headie">
                <h3>POST BLOG</h3>
            </div>
                <div class="panel">
                    <form action="{{route('blog')}}" method="POST">
                        <div class="inp">
                            <input type="text" name="title" placeholder="Title" required>
                        </div>
                        <div class="edit d-flex justify-content-center">
                            <div class="check">
                                <button onclick="boldText()" type="button" class="butt">B</button>
                                <div class="hov">
                                    <span>Bold</span>
                                </div>
                            </div>
                            <div class="check">
                                <button onclick="italicText()" type="button" class="butt"><em>I</em></button>
                                <div class="hov">
                                    <span>Italics</span>
                                </div>
                            </div>
                            <div class="check">
                                <button onclick="underlineText()" type="button" class="butt">U</button>
                                <div class="hov">
                                    <span>Underline</span>
                                </div>
                            </div>
                            <div class="check">
                                <button onclick="paragraphText()" type="button" class="butt">P</button>
                                <div class="hov">
                                    <span>Paragraph</span>
                                </div>
                            </div>
                            <div class="check">
                                <button onclick="justifyLeft()" type="button" class="butt"><i class="fa fa-align-left"></i></button>
                                <div class="hov">
                                    <span>Left</span>
                                </div>
                            </div>
                            <div class="check">
                                <button onclick="justifyCenter()" type="button" class="butt"><i class="fa fa-align-center"></i></button>
                                <div class="hov">
                                    <span>Center</span>
                                </div>
                            </div>
                            <div class="check">
                                <button onclick="justifyRight()" type="button" class="butt"><i class="fa fa-align-right"></i></button>
                                <div class="hov">
                                    <span>Right</span>
                                </div>
                            </div>
                            <div class="check">
                                <button onclick="justify()" type="button" class="butt"><i class="fa fa-align-justify"></i></button>
                                <div class="hov">
                                    <span>Justify</span>
                                </div>
                            </div>
                            {{-- <input type="color" id="colour" oninput="colr()"> --}}
                            <div class="check">
                                <select name="" id="">
                                    <option value="12">12</option>
                                    <option value="14">14</option>
                                    <option value="16">16</option>
                                    <option value="18">18</option>
                                    <option value="20">20</option>
                                </select>
                                <div class="hov">
                                    <span>Font Size</span>
                                </div>
                            </div>
                            <div class="check">
                                <button data-target="#image" data-toggle="modal" class="butt"><i class="fa fa-image"></i></button>
                                <div class="hov">
                                    <span>Image</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="text" name="blog" id="blog" hidden required>
                        </div>
                        <div>
                            <div contenteditable="true" required placeholder=" Enter Blog text" id="textarea" oninput="enterBlog(this)"></div>
                        </div>
                        @csrf
                        <div class="post">
                            <button class="teal" style="margin-top: 5px;" name="submit">POST</button>
                        </div>
                    </form>
                </div>
                <div class="modal" id="image" style="background-color: rgba(225, 225, 225, 0.3);">
                    <div class="modal-dialog x-modal">
                        <div class="modal-content shadow-sm">
            
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
            
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <div class="form-group text-center" id="search">
                                    <h5> Please select an image for blog</h5>
                                    <form action="{{route('blogImage')}}" method="post">
                                        <div>
                                            <div class="image d-flex">
                                                <i class="fa fa-avatar"></i>
                                                <img src="" alt=""  class="imagg">
                                            </div>
                                            <div>
                                                <input type="file" name="image"  value="{{old('image')}}" onchange="displayImage()" class="@error('image') is-inavlid @enderror img"><br>
                                                @error('image')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="tin">SELECT</button>
                                        </div>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            
            .headie{
                width: 100%;
                padding-top: 70px !important;
            }
            .parent {
                padding: 0% !important;
                width: 100%;
                margin: auto;
            }
            .parent .headie h3 {
                text-align: center;
                padding-top: 3%;
            }
            .teal{
                background-color: teal;
                color: white;
                border: 0;
                padding: 0.5% 2%;
                border-radius: 5px;
                font-weight: bold;
            }
            .image{
                width: 200px;
                height: 200px;
                border: 1px solid lightgrey;
                margin-bottom: 3px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: auto;
            }
            .img{
                margin-top: 5px;
            }
            .imagg{
                width: 100%;
                height: 100%;
                border: 1px solid lightgrey;
            }

            .panel {
                width: 100%;
            }
            .panel .inp {
                width: 30%;
                margin: auto;
                margin-top: 10px;
                background-color: red;
                height: 40px;
            }
            .panel #textarea {
                width: 60%;
                margin-top: 10px;
                border: 1px solid lightgrey;
                min-height: 40%;
                padding: 2%;
                max-height: fit-content;
                margin: auto;
                margin-top: 10px;
            }
            .panel .edit {
                margin-top: 20px;
                text-align: center;
                align-items: center;
            }
            .butt {
                border: none;
                width: 40px;
                height: 40px;
                background-color: black;
                color: white;
                font-weight: bold;
                border-radius: 5px;
            }
            .panel .post {
                text-align: center;
            }
            .butt{
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .hov{
                background-color: red;
                padding: 2px 10px;
                margin: 2px;
                margin-top: 5px;
                height: 50px;
                border-radius: 4px;
                position: absolute;
                display: none;
                z-index: 10;
            }
            .check{
                display: block;
                align-items: center;
                margin: 2px; 
            }
            .butt:hover .hov{
                display: inherit;
            }
            .tin{
                background-color: teal;
                border: 0;
                color: white;
                padding: 5px 15px;
                border-radius: 5px;
                margin-top: 10px;
            }
            .close{
                border: 0;
                background-color: transparent;
                font-weight: bolder;
                padding-left: 95%;
            }

            @media(max-width:1020px){
                
            }
            @media (max-width: 760px) {
                .parent {
                    width: 100%;
                    padding: 5% 2%;
                }
        
                .panel #textarea {
                    width: 100%;
                }
                .panel .inp{
                    width: 100%;
                    background-color: red;
                }
                .panel .edit {
                    line-height: 1.5 !important;
                }
                .edit{
                    width: 100% !important;
                }
                .butt {
                    width: 30px;
                    height: 30px;
                }
                #textarea{
                    width: 90% !important;
                }
            }
        </style>

        <script>
            let bg = document.getElementById('blog');

            // TO DISPLAY IMAGE ONCHANGE
            function displayImage(){
                let reader = new FileReader;
                let img = document.querySelector('.img').files[0];

                reader.onload=function(){
                    document.querySelector('.imagg').src=reader.result;
                }
                reader.readAsDataURL(img);

            }


    
            function enterBlog(params){
                bg.value = params.innerHTML;
                // console.log(bg.value)
            }
            
            function boldText(){
                document.execCommand('bold', false, null)
            }
            function italicText(){
                document.execCommand('italic', false, null)
            }
            function underlineText(){
                document.execCommand('underline', false, null)
            }
            function paragraphText(){
                document.execCommand('paragraph', false, null)
            }
            function justifyLeft(){
                document.execCommand('justifyLeft', false, null)
            }
            function justifyCenter(){
                document.execCommand('justifyCenter', false, null)
            }
            function justifyRight(){
                document.execCommand('justifyRight', false, null)
            }
            function justify(){
                document.execCommand('justify', false, null)
            }
            function colr(){
                display.style.color = b.value
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
