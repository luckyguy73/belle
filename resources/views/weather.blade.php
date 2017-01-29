@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default list">
                <div id="weather-id" class="panel-heading header">Current Weather in your City</div>

                <div id="mcweather" class="panel-body">
                    <div id="weather"></div>
                    <div id="city"></div>
                    <div id="desc"></div>
                    <div id="temp"></div>

                   <button class="btn btn-success" onclick="convert()">Toggle C or F</button>
                   <button class="btn btn-success" onclick="chgZip()">Change Zip</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    var Request1 = false;
    var f = 0;    
    Request1 = new XMLHttpRequest();
    
    if (Request1) {
        var weather = document.getElementById("weather");
        var zip = prompt("Please enter your zipcode", 90210);
        if (zip === null) zip = 90210;
        Request1.open("GET", "http://api.openweathermap.org/data/2.5/weather?q=" + zip + ",us&units=imperial&appid=3b6a4d5317f46b6971d8ace4432a4f6d");
        Request1.onreadystatechange = function() {
            if (Request1.readyState == 4 && Request1.status == 200) {
                var json = JSON.parse(Request1.responseText);
                if (json.cod == "404")
                    weather.innerHTML = "Weather not Found for that zipcode.  Please try again.";
                
                document.getElementById("city").innerHTML =  json.name + ", " + json.sys.country + " " + zip; 
                document.getElementById("desc").innerHTML =  json.weather[0].description + "<img id='icon'>";
                document.getElementById("temp").innerHTML =  Math.round(json.main.temp) + "&#8457;";
                f = Math.round(json.main.temp);
                document.getElementById("icon").src =  "http://openweathermap.org/img/w/" + json.weather[0].icon  + ".png";
            }
        }
        
        Request1.send();       
    }
    function chgZip() {
        history.go(0);
    }

    var count = 1;    
    function convert() {
        if (count % 2 == 0) {
            document.getElementById("temp").innerHTML =  f + "&#8457;";
        } else {
        c = (f - 32) * 5 / 9;
        document.getElementById("temp").innerHTML =  c.toFixed() + "&#8451;";
        }
        count++;
    }
</script>    
@stop