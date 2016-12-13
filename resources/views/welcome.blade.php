<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ config('app.name', 'Belle Moda') }}</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #111;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                width: 100vw;
                margin: 0;
                opacity: 0.7;
                overflow: hidden;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-content: flex-start;
                /*align-items: center;*/
                display: block;
                margin: auto;
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
                margin: 20% 0 0 0;
            }

            .title {
                font-size: 84px;
                overflow: auto;
                color: #111;
            }

            .links > a {
                color: #111;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 50px;
            }
            
            .btn-info {
                font-weight: bold;
            }
            
            .home-view video {
                position: absolute;
                z-index: -1;
                top: 0;
                left: 0;
                min-width: 100%;
                min-height: 100%;
            }
            
            .search-field::-webkit-input-placeholder {
                color: #aaa;
                font-weight: bold;
            }
            input:focus::-webkit-input-placeholder { color:transparent; }
            input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
            input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
            input:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */
        </style>
    </head>
    <body>
        <div class="container-fluid">
           
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
                <div class="section">
                    <!-- Video Background -->
                    <div class="home-view page" style="opacity: 1;">
                        <div class="content">
                           <div class="inner" style="-webkit-filter: none; transform: translateX(0px) translateY(0px);"></div>
                        </div>
                        @if (rand(1,5) === 1)
                        <video muted autoplay="" loop="" src="https://static.videezy.com/system/resources/previews/000/004/053/original/Beatiful_rocks_in_the_beach.mp4" class="" style="opacity: .7;"></video>
                        
                        @elseif (rand(1,5) === 2)
                        <video muted autoplay="" loop="" src="https://static.videezy.com/system/resources/previews/000/002/302/original/storm-clouds-timelapse.mp4" class="" style="opacity: .7;"></video>
                        
                        @elseif (rand(1,5) === 3)
                        <video muted autoplay="" loop="" src="https://static.videezy.com/system/resources/previews/000/000/212/original/Beach%20rocks%20at%20dusk%20[SaveYouTube.com].mp4" class="" style="opacity: .7;"></video>
                        
                        @elseif (rand(1,5) === 4)
                        <video muted autoplay="" loop="" src="https://static.videezy.com/system/resources/previews/000/002/725/original/clouds-over-field.mp4" class="" style="opacity: .7;"></video>
                        
                        @else
                        <video muted autoplay="" loop="" src="https://static.videezy.com/system/resources/previews/000/004/052/original/Beach_Rocks___Blue_Ocean.mp4" class="" style="opacity: .7;"></video>    
                        @endif    
                    </div>
                </div>
                <div class="title">
                    {{ config('app.name', 'Belle Moda') }}
                </div>
                <form class="form-inline" method="get" action="https://www.google.com/search" 
                   target="_blank" _lpchecked="1">
                    <div class="form-group text-center">
                      <input type="reset" class="btn btn-info" name="reset" value="Clear" tabindex="1">
                      <input class="form-control search-field" name="q" type="text" size="80" placeholder="search google">
                      <input type="submit" class="btn btn-info" name="submit" value="Search" tabindex="0">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
