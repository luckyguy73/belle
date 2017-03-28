@extends('layouts.app')

@section('styles')
  <style>
    html, body {
                font-family: montserrat, cambria, sans-serif;
                font-size: 1.1rem;
                margin: 0;
                padding: 0;
            }
            
            body { 
                background: #DFFDFF;
            }
            
            h1, h2, h3, h4, h5, h6 {
                color:midnightblue;
                font-weight: 700;
            }
            
            li {
                color: midnightblue;
                font-weight: 700;
                list-style-type: none;
            }
            
            li.light {
                color: green;
            }
            
            .offset {
                position: relative;
                bottom: 5px;
            }
           
            #Msg {
                color: lime;
            }
            
            #player, #computer {
                color: darkmagenta;
            }
  </style>
@stop

@section('content')
  <div class="col-md-8 col-md-offset-2 panel panel-default">
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('games.index') }}">Javascript Games</a></li>
      <li class="active">Rock, Paper, Scissors</li>
    </ol>
    
    <h1 class="text-center">Play the Rock, Paper, Scissors Game</h1>
    
    <div id="howToPlay">
    <div id="help" class="collapse text-center">
      <h3>How to play Rock, Paper, Scissors</h3>
      <ul>
        <li>Player makes choice</li>
        <li>Computer makes choice</li>
        <li>See who wins!!</li>   
        <li class="light">Rock beats Scissors</li>
        <li class="light">Paper beats Rock</li>
        <li class="light">Scissors beats Paper</li>
        <li>Find out more at the <a href="https://en.wikipedia.org/wiki/Rock-paper-scissors" target="_blank" class="text-danger">Wiki page! <img src="https://lh4.googleusercontent.com/-6I-fIikz20s/V63wyc8VUjI/AAAAAAAAAQ8/t79y7hvDbQ0apzXvO8d4PhmiGgdDTEaxACL0B/s531-no/external-link.png" style="width:16px;height:16px;" class="offset"></a></li>
      </ul>
      <div class="form-group text-center">
        <a href="#home"><button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#help"> Close </button></a>
      </div>
      <hr>
    </div> 
    </div>  
    <div class="panel-body">
          <h3 class="text-center">Begin Game</h3> 
          <form class="text-center form-group">
          <button type="button" class="btn btn-primary" onClick = ProcessMove("Rock") data-toggle="modal" data-target="#myModal">💎 Rock</button>
          <button type="button" class="btn btn-primary" onClick = ProcessMove("Paper") data-toggle="modal" data-target="#myModal">📄 Paper</button>
          <button type="button" class="btn btn-primary" onClick = ProcessMove("Scissors") data-toggle="modal" data-target="#myModal">✂️ Scissors</button>
          </form>
          <div class="form-group">
          <button class="btn btn-default">
            <a href="#results" data-toggle="collapse" data-target="#tally"> Results </a>
          </button>
          <button class="btn btn-default">
            <a href="#howToPlay" data-toggle="collapse" data-target="#help"> How To Play </a>
          </button>
          </div>
          <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content text-center">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Game #<span id="gameCount"></span></h3>
              </div>
              <div class="modal-body">
                <p id="player"><b>Player Chooses: <span id="PMove"> </span></b></p>
                <p id="computer"><b>Computer Chooses: <span id="CMove"> </span></b></p>
                <h3><b><span id="Msg"> </span></b></h3>
              </div>
              <div class="modal-footer">
                <span class="pull-left">Player won <span id="total2">0</span> games!</span>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>    
            </div>
          </div>
          </div>
          
          <div id="results">
          <div id="tally" class="collapse">
            <hr> 
            <h2>Game Results</h2>
            <table class="table table-hover table-responsive">
              <thead>
                <tr>
                  <th>Game#</th>
                  <th>Player Choice</th>
                  <th>Computer Choice</th>
                  <th>Winner</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <td colspan="4">Player won <span id="total">0</span> games!</td>
                </tr>
              </tfoot>
              <tbody id="myTable">
              </tbody>
            </table>
            <a href="#home"><button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#tally"> Close </button></a>
            <button type="button" class="btn btn-danger" onClick = startOver()>🔄 Start Over </button>
          </div>
          </div>
    </div>
  </div>
@stop

@section('scripts')
  <script>
    var playerWins = 0;
            var totalGames = 0;
            
            function ProcessMove(playerMove) {
                randomNo = Math.floor((Math.random() * 3) + 1); //Generate a random number from 1 - 3
                if (randomNo == 1) computerMove = "Rock";
                if (randomNo == 2) computerMove = "Paper";
                if (randomNo == 3) computerMove = "Scissors";
                switch (computerMove) {
                  case "Rock":
                    if (playerMove == "Rock") {
                      document.getElementById('Msg').innerHTML = "It's a tie!"
                    }
                    if (playerMove == "Paper") {
                      document.getElementById('Msg').innerHTML = "You win!"
                      playerWins = playerWins + 1;
                    }
                    if (playerMove == "Scissors") {
                      document.getElementById('Msg').innerHTML = "The Computer Wins!"
                    }
                    break;
                  case "Paper":
                    if (playerMove == "Rock") {
                      document.getElementById('Msg').innerHTML = "The Computer Wins!"
                    }
                    if (playerMove == "Paper") {
                      document.getElementById('Msg').innerHTML = "It's a tie!"
                    }
                    if (playerMove == "Scissors") {
                      document.getElementById('Msg').innerHTML = "You win!"
                      playerWins = playerWins + 1;
                    }
                    break;
                  case "Scissors":
                    if (playerMove == "Rock") {
                      document.getElementById('Msg').innerHTML = "You win!"
                      playerWins = playerWins + 1;
                    }
                    if (playerMove == "Paper") {
                      document.getElementById('Msg').innerHTML = "The Computer Wins!"
                    }
                    if (playerMove == "Scissors") {
                      document.getElementById('Msg').innerHTML = "It's a tie!"
                    }
                    break;
                }
                
                totalGames = totalGames + 1;
                document.getElementById('CMove').innerHTML = computerMove;
                document.getElementById('PMove').innerHTML = playerMove;
                document.getElementById('gameCount').innerHTML = totalGames;
                document.getElementById('total').innerHTML = playerWins;
                document.getElementById('total2').innerHTML = playerWins;
                var winner = document.getElementById('Msg').innerHTML;
                var table = document.getElementById("myTable");
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                cell1.innerHTML = totalGames;
                cell2.innerHTML = playerMove;
                cell3.innerHTML = computerMove;
                cell4.innerHTML = winner;
                
            }
            
            function startOver() {
                location.reload();
            }
  </script>
@stop