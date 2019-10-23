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
                opacity: 0.9;
                overflow: hidden;
                display: block;
                box-sizing: border-box;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 15%;
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
                margin-bottom: 30px;
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
                overflow: hidden;
            }

            .search-field::-webkit-input-placeholder {
                color: #aaa;
                font-weight: bold;
            }
            input:focus::-webkit-input-placeholder { color:transparent; }
            input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
            input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
            input:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */

            @media screen and (max-width:580px) {
                video {
                    display: none;
                }
            }
            .form-control {
                color: black;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">

            @if (Auth::user())
                <div class="top-right links">
                    <a href="{{ url('/home') }}">{{ ucwords(Auth::user()->name) }}</a>
                </div>
            @else
                <div class="top-right links">
                    <a href="{{ url('/login') }}">LOGIN</a>
                    <a href="{{ url('/register') }}">REGISTER</a>
                </div>
            @endif

            <div class="content">
                    <!-- Video Background -->
                    <div class="home-view page">
                        
                        <?php $rand = mt_rand(1,12); ?>
                        @if ($rand === 1)
                        <video muted autoplay loop src="https://static.videezy.com/system/resources/previews/000/004/053/original/Beatiful_rocks_in_the_beach.mp4" class="" style="opacity: .7;"></video>

                        @elseif ($rand === 2)
                        <video muted autoplay loop src="https://cdn.videvo.net/videvo_files/converted/2014_11/preview/GOSTI_OBLAKI.mp443881.webm" class="" style="opacity: .7;"></video>

                        @elseif ($rand === 3)
                        <video muted autoplay loop src="https://static.videezy.com/system/resources/previews/000/005/518/original/DSC_0082.mp4" class="" style="opacity: .7;"></video>

                        @elseif ($rand === 4)
                        <video muted autoplay loop src="https://static.videezy.com/system/resources/previews/000/033/826/original/pattaya-aerial-view30.mp4" class="" style="opacity: .7;"></video>
                        
                        @elseif ($rand === 5)
                        <video muted autoplay loop src="https://static.videezy.com/system/resources/previews/000/004/927/original/Snowflakes_Falling_Motion_Background_4K.mp4" class="" style="opacity: .7;"></video>
                        
                        @elseif ($rand === 6)
                        <video muted autoplay loop src="https://static.videezy.com/system/resources/previews/000/004/956/original/Sunray_Clouds_4K_Living_Background.mp4" class="" style="opacity: .7;"></video>
                        
                        @elseif ($rand === 7)
                        <video muted autoplay loop src="https://static.videezy.com/system/resources/previews/000/005/030/original/Silk_4K_Wedding_Background.mp4" class="" style="opacity: .7;"></video>
                        
                        @elseif ($rand === 8)
                        <video muted autoplay loop src="https://static.videezy.com/system/resources/previews/000/004/052/original/Beach_Rocks___Blue_Ocean.mp4" class="" style="opacity: .7;"></video>
                        
                        @elseif ($rand === 9)
                        <video muted autoplay loop src="https://static.videezy.com/system/resources/previews/000/012/392/original/Water_19_-_60s_-_4k_res.mp4" class="" style="opacity: .7;"></video>
                        
                        @else
                        <video muted autoplay loop src="https://static.videezy.com/system/resources/previews/000/013/479/original/Water_59_-_30s_-_4k_res.mp4" class="" style="opacity: .7;"></video>
                        @endif
                    </div>
                <div class="title .m-b-md">
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
