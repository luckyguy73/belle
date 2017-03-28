@extends('layouts.app')

@section('styles')
    
    <style>
        .code {
          font-size: 50px;
        }
        
        .failure {
          color: #d9534f;
        }
        
        .success {
          color: #5cb85c;
        }
        
        .form-inline {
          margin-bottom: 10px;
        }
        
        .message {
          font-weight: bold;
        }
    </style>

@stop

@section('content')
     <div class="col-sm-8 col-sm-offset-2 panel panel-default">
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('games.index') }}">Javascript Games</a></li>
          <li class="active">Code breaker</li>
        </ol>
        <div class="panel-heading text-center">
            <h1>Code Breaker</h1>
        </div>
        <div class="panel-body text-center form-group">
            <div id="code" class="code"><strong>????</strong></div>
            <div id="guessing-div" class="row form-inline">
                <input type="hidden" id="attempt"/>
                <input type="hidden" id="answer"/>
                <input id="user-guess" class="form-control" type="number" />
                <button class="btn btn-primary" onclick="guess()">Submit Guess</button>
            </div>

            <div id="replay-div" class="form-group" style="display:none">
                <button class="btn btn-primary" onclick="window.location.reload()">
                    Play again?
                </button>
            </div>
            <!-- Button trigger modal -->
              <button type="button" class="btn btn-default btn-lg" data-toggle="modal" 
                data-target="#instructionModal">Instructions
              </button>

            <div class="row">
                <h2 id="message" class="message"></h2>
            </div>

            <div class="row" id="results">
                <div class="row">
                    <strong class="col-md-6">Guess</strong>
                    <strong class="col-md-6">Result</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="instructionModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Code breaker Instructions</h4>
          </div>
          <div class="modal-body">
               <h2>Objective:</h2>
               <p class="lead">Guess the randomly generated 4 digit code.</p>

               <h2>Rules:</h2>
               <ul>
                 <li>Each guess must consist of 4 numeric characters.</li>
                 <li>Numbers may be used more than once!</li>
                 <li>You win only if your guess is an exact match.</li>
                 <li>You lose if you fail to guess the code under 10 guesses.</li>
                 <li>
                   <span>✅</span>
                   Indicates a number is in the correct place.
                 <li>
                   <span>🔄</span>
                   Indicates a number is part of the code, but not in the right position.
                 </li>
                 <li>
                   <span>🔄</span>
                   Doesn't consider how many times a number exists in the code.
                 </li>
                 <li>
                   <span>❌</span>
                   Indicates a number is not part of the code.
                 </li>
               </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@stop

@section('scripts')
    <script>
        //codebreaker game begins
        let answer = document.getElementById('answer');
        let attempt = document.getElementById('attempt');
        let message = document.getElementById('message');
        let results = document.getElementById('results');
        let code = document.getElementById('code');
        let gd = document.getElementById('guessing-div');
        let rd = document.getElementById('replay-div');

        function guess() {
            let input = document.getElementById('user-guess');
            //add functionality to guess function here
            answer.value ? false: setHiddenFields();
            if(!validateInput(input.value)) return false;
            attempt.value++;
            if(getResults(input.value)) {
                setMessage("You Win! 😃");
                showAnswer(true);
                showReplay();
                return;
            } 
            if (attempt.value >= 10) {
                setMessage('You Lose! 😢');
                showAnswer(false);
                showReplay();
                return;     
            }
            setMessage('Incorrect, try again.');

        }

        //implement new functions here
        function setHiddenFields() {
            attempt.value = 0;
            answer.value = Math.floor(Math.random()*(10000)).toString();
            while(answer.value.length < 4) {
                answer.value = '0' + answer.value;
            }
        }

        function setMessage(note) {
            message.innerHTML = note;
        }

        function validateInput(check) {
            if(check.length === 4) return true;
            setMessage("Guesses must be exactly 4 characters long.");
            return false;
        }

        function getResults(inputResults) {
            let begResult = '<div class="row"><span class="col-md-6">' + inputResults + '</span><div class="col-md-6">';
            let wrong = '<span>❌</span>';
            let close = '<span>🔄</span>';
            let yup = '<span>✅</span>';
            let tally = 0;

            for (let x = 0; x < inputResults.length; x++) {
                if(answer.value.indexOf(inputResults[x]) === -1) {
                    begResult += wrong;
                } else if (inputResults[x] == answer.value[x]) {
                    begResult += yup;
                    tally++;
                } else {
                    begResult += close;
                }
            }
            results.innerHTML += begResult + '</div></div>';
            return tally === 4 ? true : false;
        }

        function showAnswer(uponWin) {
            code.innerHTML = answer.value;
            code.className += uponWin ? " success" : " failure";
        }

        function showReplay() {
            gd.style.display = 'none';
            rd.style.display = 'block';
        }
        //codebreaker game ends

    </script>
@stop