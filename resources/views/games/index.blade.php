@extends('layouts.app')

@section('content')
<div id='main' class="container-fluid">
    <ol class="breadcrumb col-md-6 col-md-offset-3">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">Javascript Games</li>
    </ol>

    <div class="col-md-6 col-md-offset-3 panel panel-default">
        <div class="panel-body">
            <ul>
                <li><a href="https://luckyguy73.github.io/CodeBreakerProject/" target="_blank">Code Breaker</a></li>
                <li><a href="{{ route('games.typing') }}">Typing Test Challenge</a></li>
                <li><a href="{{ route('games.rock-paper-scissors') }}">Rock, Paper, Scissors</a></li>
            </ul>
        </div>
    </div>
</div>

@stop