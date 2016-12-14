@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="dash" class="panel panel-default">
                <div class="panel-heading"><span>{{ ucfirst(strtolower(substr(Auth::user()->name, 0, strpos(Auth::user()->name, ' ')))) }}'s Dashboard</span><span id="lynx"><img src="images/links.png" width="28" height="28" alt="links"></span></div>
                <div class="panel-body">
                   <div class="dashboard-links">
                        <a href="https://plus.google.com/" title="google+" target="_blank"><img src="images/google.png" width="36" height="36" alt="google plus"></a>
                        <a href="https://twitter.com/" title="twitter" target="_blank"><img src="images/twitter.png" width="36" height="36" alt="twitter"></a>
                        <a href="https://www.facebook.com/" title="facebook" target="_blank"><img src="images/facebook.png" width="36" height="36" alt="facebook"></a>
                        <a href="https://www.github.com/" title="github" target="_blank"><img src="images/github.png" width="36" height="36" alt="github"></a>
                        <a href="https://www.youtube.com" title="youtube" target="_blank"><img src="images/youtube.png" width="36" height="36" alt="youtube"></a>
                        <a href="https://www.tumblr.com/" title="tumblr" target="_blank"><img src="images/tumblr.png" width="36" height="36" alt="tumblr"></a>
                        <a href="https://www.instagram.com" title="instagram" target="_blank"><img src="images/instagram.png" width="36" height="36" alt="instagram"></a>                        
                        <a href="https://www.linkedin.com/" title="linkedin" target="_blank"><img src="images/linkedin.png" width="36" height="36" alt="linkedin"></a>
                        <a href="https://www.pinterest.com/" title="pinterest" target="_blank"><img src="images/pinterest.png" width="36" height="36" alt="pinterest"></a>
                    </div>
                    <div id="apps">
                        
                        <ul>Apps
                            <li><a href="{{ url('/tasks') }}">Task List <img src="images/task list.png" width="26" height="26" alt="task list"></a></li>
                            <li><a href="{{ url('weather') }}">Weather <img src="images/weathericon.png" width="28" height="28" alt="weather"></a></li>
                            <li><a href="{{ url('exercise') }}">Workout <img src="images/exercise icon.png" width="30" height="30" alt="exercise"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
