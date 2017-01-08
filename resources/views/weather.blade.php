<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.55">
    <title>Get Weather</title>
    <link rel="stylesheet" href="{{ elixir('css/getweather.css') }}" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="{{ elixir('js/getweather.js') }}"></script>
    
</head>
<body>
    <div class='wrapper'>
        <search>
            <form>
                <input class='searchbar transparent' id='search' type='text' placeholder='enter city, country' autocomplete='off'/>
                <input class='button transparent' id='button' type="submit" value='GO' />
            </form>
            
        </search>

        <div class='panel'>
            <h2 class='city' id='city'></h2>
            <div class='weather' id='weather'>
                <div class='group secondary'>
                    <h3 id='dt'></h3>
                    <h3 id='description'></h3>
                </div>
                <div class='group secondary'>
                    <h3 id='wind'></h3>
                    <h3 id='humidity'></h3>
                </div>
                <div class='temperature' id='temperature'>
                    <h1 class='temp' id='temp'><i id='condition'></i> <span id='num'></span><a class='fahrenheit active' id='fahrenheit' href="#">&deg;F</a><span class='divider secondary'>|</span><a class='celsius' id='celsius' href="#">&deg;C</a></h1>
                </div>
                <div class='forecast' id='forecast'></div>
            </div>
        </div>

    </div>   
<a href="{{url('home')}}" title="home"><i id="home" class="material-icons">home</i></a>
</body>
</html>