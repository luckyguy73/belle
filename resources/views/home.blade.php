@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="dash" class="panel panel-default">
                <div class="panel-heading">
                    <span>{{ $pname }}'s Dashboard</span>
                    <span id="lynx"><img src="images/links.png" width="28" height="28" alt="links"></span>
                </div>
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
                        <ul>
                            <li><img src="images/aml.png" width="28" height="28" 
                                alt="classifieds"><a 
                                href="{{ url('https://murmuring-springs-26290.herokuapp.com/') }}" 
                                target="_blank">AshtonMorgan | Listings</a></li>
                            <li><img src="images/blog.jpg" width="28" height="28" 
                                alt="blog posts"><a 
                                href="{{ route('blogs.index') }}">Blog Posts</a></li>
                            <li><img src="images/chef.png" width="28" height="28" alt="recipes"><a
                                href="{{ url('https://belle-moda.herokuapp.com/') }}" 
                                target="_blank">Delish Recipes</a></li>
                            <li><img src="images/games.png" width="28" height="28" alt="games"><a href  ="{{ url('/games') }}">Javascript Games</a></li>
                            <li><img src="images/task list.png" width="28" height="28" 
                                alt="task list"><a href="{{ url('/tasks') }}">Task List</a></li>
                            <li><img src="images/weathericon.png" width="28" height="28" 
                                alt="weather"><a href="{{ url('weather') }}">Weather</a></li>
                            <li><img src="images/exercise icon.png" width="28" height="28" 
                                alt="exercise"><a href="{{ url('exercise') }}">Workout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
