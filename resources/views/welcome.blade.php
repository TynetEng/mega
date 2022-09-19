<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="parent"></div>
    <div class="parent2"></div>

    <style>
        .parent{
            width: 800px;
            background: linear-gradient(rgb(18, 1, 34), blue);
            height: 200px;
            position: absolute;
            top: 0;
            right: 0;
            -moz-border-radius: 0px 0px 20px 110px;
            -webkit-border-radius: 0px 0px 20px 110px;
            border-radius: 0px 0px 20px 110px;
        }

        .parent2{
            width: 800px;
            background: linear-gradient(blue, rgb(18, 1, 34));
            height: 200px;
            position: absolute;
            bottom: 0;
            left: 0;
            -moz-border-radius: 20px 110px 0px 0px;
            -webkit-border-radius: 20px 110px 0px 0px;
            border-radius: 20px 110px 0px 0px;
        }
    </style>
</body>
</html>