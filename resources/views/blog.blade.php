<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                @if($su=Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{$su}}</strong>
                    </div>
                @endif 
            </div>
            <div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <span>{{$error}}</span>
                    </div>
        
                @endif
            </div>
            <div class="headie">
                <h3>POST BLOG</h3>
            </div>
                <div class="panel">
                    <form action="{{route('blog')}}" method="POST">
                        <div class="inp">
                            <input type="text" name="title" placeholder="Post Title" required class="form-control">
                        </div>
                        <div class="edit">
                            <button onclick="boldText()" type="button">B</button>
                            <button onclick="italicText()" type="button"><em>I</em></button>
                            <button onclick="underlineText()" type="button">U</button>
                            <button onclick="paragraphText()" type="button">P</button>
                            <button onclick="justifyLeft()" type="button"><i class="fa fa-align-left"></i></button>
                            <button onclick="justifyCenter()" type="button"><i class="fa fa-align-center"></i></button>
                            <button onclick="justifyRight()" type="button"><i class="fa fa-align-right"></i></button>
                            <button onclick="justify()" type="button"><i class="fa fa-align-justify"></i></button>
                            <input type="color" id="colour" oninput="colr()">
                            <select name="" id="">
                                <option value="12">12</option>
                                <option value="14">14</option>
                                <option value="16">16</option>
                                <option value="18">18</option>
                                <option value="20">20</option>
                            </select>
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
            </div>
        </div>

        <style>
            
            .headie{
                width: 100%;
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
    
            .panel {
                width: 100%;
            }
            .panel .inp {
                width: 30%;
                margin: auto;
                margin-top: 10px;
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
            }
            .panel .edit button {
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
    
            @media (max-width: 760px) {
            .parent {
                width: 100%;
                padding: 5% 2%;
            }
    
            .panel #textarea {
                width: 100%;
            }
            .panel .inp {
                width: 50%;
            }
            .panel .edit {
                line-height: 1.5 !important;
            }
        }
        </style>

        <script>
            let bg = document.getElementById('blog')

            function enterBlog(params){
                bg.value = params.innerHTML;
                console.log(bg.value)
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
    </body>
</html>
