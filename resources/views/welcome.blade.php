<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ config('app.name', 'Belle Moda') }}</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            @media (max-width:350px) {
                html, body {
                    overflow: auto;
                }
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                overflow: auto;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           
            @if (Auth::user())
                <div class="top-right links">
                    <a href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                </div>
            @else   
                <div class="top-right links">
                    <a href="{{ url('/login') }}">LOGIN</a>
                    <a href="{{ url('/register') }}">REGISTER</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name', 'Belle Moda') }}
                </div>
<form class="form-inline" method="get" action="https://www.google.com/search" target="_blank" _lpchecked="1">
<div class="form-group text-center">
  <input type="reset" class="btn btn-info" name="reset" value="Clear" tabindex="1">
  <input class="form-control" name="q" type="text" size="80" placeholder="search google">
  <input type="submit" class="btn btn-info" name="submit" value="Search" tabindex="0">

</div></form>
               
            </div>
        </div>
    </body>
</html>
