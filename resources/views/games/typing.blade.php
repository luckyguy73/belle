@extends('layouts.app')

@section('styles')
  <style>
    .correct {
      color: lime;
    }  
    .error {
      color: red;
    }
  </style>
@stop

@section('content')
  <div class="col-sm-8 col-sm-offset-2 panel panel-default">
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('games.index') }}">Javascript Games</a></li>
      <li class="active">Typing Test</li>
    </ol>
    <h1 style = "color:blue">Typing Test Challenge</h1>
      <!-- Button trigger modal -->
      <div class="form-group">
        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" 
          data-target="#instructionModal">Instructions
        </button>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="instructionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Typing Test Challenge Instructions</h4>
            </div>
            <div class="modal-body">
              <p>The Typing Test Challenge is a timed challenge that displays 5 sentences that you must type exactly as shown.  In order to complete the challenge you must enter each sentence correctly.</p>

              <p>After you finish typing a sentence you can either Tab or use your mouse to click the next input box.  You will immediately be notified if your previous sentence is correct or incorrect at which time you can fix any errors and continue.</p>

              <p>Click the Begin Test button when you are ready to start, and then once all 5 sentences are typed correctly you may click the Finish Test button to stop the timer.
              </p>      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <form name="appForm">     
        <div class="form-group">
          <input class="btn btn-primary" type="button" value="Begin Test" id="btnControl1"
            onclick="startQuiz(); startTimer();">
        </div>
        <div class="form-group">
          <span id="trgtDiv1"></span>
          <input class="form-control" tabindex="1" type="text" id="inputField1" name="input1" 
            disabled autocomplete="off">
          <span id="error1"></span>
        </div>
        <div class="form-group">
          <span id="trgtDiv2"></span>
          <input class="form-control" tabindex="2" type="text" id="inputField2" name="input2" 
            disabled autocomplete="off">
          <span id="error2"></span>
        </div>
        <div class="form-group">
          <span id="trgtDiv3"></span>
          <input class="form-control" tabindex="3" type="text" id="inputField3" name="input3" 
            disabled autocomplete="off">
          <span id="error3"></span>
        </div>
        <div class="form-group">
          <span id="trgtDiv4"></span>
          <input class="form-control" tabindex="4" type="text" id="inputField4" name="input4" 
            disabled autocomplete="off">
          <span id="error4"></span>
        </div>
        <div class="form-group">
          <span id="trgtDiv5"></span>
          <input class="form-control" tabindex="5" type="text" id="inputField5" name="input5" 
            disabled autocomplete="off">
          <span id="error5"></span>
        </div> 
        <input tabindex="6" name="buttonFinish" type="button" class="pause btn btn-default" 
          data-toggle="modal" data-target="#finishedModal" id="done" onclick="endGame()" 
          value="Finish Game" disabled>
        <button class="btn btn-default" onclick="restart()">Restart</button>
      </form>
      <h2 style="color:blue">Seconds: 0</h2>
      
      <!-- Modal -->
      <div class="modal fade" id="finishedModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body text-center">
              <div id="finished" title="Finished Challenge!">
                <h1>Great job!!</h1>
                <p>You finished with a time of <span id="myTime"></span> seconds!</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
  </div>
@stop

@section('scripts')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
  var Request1 = false;
  var Request2 = false;
  var Request3 = false;
  var Request4 = false;
  var Request5 = false;

  var sentence1 = "";
  var sentence2 = "";
  var sentence3 = "";
  var sentence4 = "";
  var sentence5 = "";

  Request1 = new XMLHttpRequest();
  Request2 = new XMLHttpRequest();
  Request3 = new XMLHttpRequest();
  Request4 = new XMLHttpRequest();
  Request5 = new XMLHttpRequest();

  function startQuiz() {
    appForm.input1.disabled = "";
    if (Request1) {
      var RequestObj1 = document.getElementById("trgtDiv1");
      Request1.open("GET", "/assets/challenge1.php");
      Request1.onreadystatechange = function() {
        if (Request1.readyState == 4 && Request1.status == 200) {
          sentence1 = Request1.responseText.split("!")[0];                   
          RequestObj1.innerHTML = sentence1;
          $("#inputField1").focus();    
        }
      }
      Request1.send();       
    }
  }

  $("#inputField1").blur(function(){
    if($('#inputField1').val() == sentence1) {
      $("#error1").html("<span class='correct'>&nbsp;&#x2714 This sentence is correct!</span>");
      appForm.input2.disabled = "";
      if (Request2) {
        var RequestObj2 = document.getElementById("trgtDiv2");
        Request2.open("GET", "/assets/challenge2.php");
        Request2.onreadystatechange = function() {
          if (Request2.readyState == 4 && Request2.status == 200) {
            sentence2 = Request2.responseText.split("!")[0];    
            RequestObj2.innerHTML = sentence2;
            $("#inputField2").focus();
          }
        }
        Request2.send();
      }
    } else
      $("#error1").html("<span class='error'>&nbsp;&#x2718 This sentence is incorrect!</span>");
  });

  $("#inputField2").blur(function(){
    if($('#inputField2').val() == sentence2) {
      $("#error2").html("<span class='correct'>&nbsp;&#x2714 This sentence is correct!</span>");
      appForm.input3.disabled = "";
      if (Request3) {
        var RequestObj3 = document.getElementById("trgtDiv3");
        Request3.open("GET", "/assets/challenge3.php");
        Request3.onreadystatechange = function() {
          if (Request3.readyState == 4 && Request3.status == 200) {
            sentence3 = Request3.responseText.split("!")[0];    
            RequestObj3.innerHTML = sentence3;
            $("#inputField3").focus();
          }
        }
        Request3.send();       
      }
    } else
      $("#error2").html("<span class='error'>&nbsp;&#x2718 This sentence is incorrect!</span>");
  });

  $("#inputField3").blur(function(){
    if($('#inputField3').val() == sentence3) {
      $("#error3").html("<span class='correct'>&nbsp;&#x2714 This sentence is correct!</span>");
      appForm.input4.disabled = "";
      if (Request4) {
        var RequestObj4 = document.getElementById("trgtDiv4");
        Request4.open("GET", "/assets/challenge4.php");
        Request4.onreadystatechange = function() {
          if (Request4.readyState == 4 && Request4.status == 200) {
            sentence4 = Request4.responseText.split("!")[0];    
            RequestObj4.innerHTML = sentence4;
            $("#inputField4").focus();    
          }
        }
        Request4.send();       
      }
    } else
      $("#error3").html("<span class='error'>&nbsp;&#x2718 This sentence is incorrect!</span>");
  });

  $("#inputField4").blur(function(){
    if($('#inputField4').val() == sentence4) {
      $("#error4").html("<span class='correct'>&nbsp;&#x2714 This sentence is correct!</span>");
      appForm.input5.disabled = "";
      if (Request5) {
        var RequestObj5 = document.getElementById("trgtDiv5");
        Request5.open("GET", "/assets/challenge5.php");
        Request5.onreadystatechange = function() {
          if (Request5.readyState == 4 && Request5.status == 200) {
            sentence5 = Request5.responseText.split("!")[0];    
            RequestObj5.innerHTML = sentence5;
            $("#inputField5").focus();    
          }
        }
        Request5.send();       
      }
    } else
      $("#error4").html("<span class='error'>&nbsp;&#x2718 This sentence is incorrect!</span>");
  });

  $("#inputField5").blur(function(){
    if($('#inputField5').val() == sentence5) {
      $("#error5").html("<span class='correct'>&nbsp;&#x2714 This sentence is correct!</span>");
      appForm.buttonFinish.disabled = "";
      $("#done").focus(); 
    } else
      $("#error5").html("<span class='error'>&nbsp;&#x2718 This sentence is incorrect!</span>");
  });

  $('body').bind('cut copy paste', function (e) {
    e.preventDefault();
  });

  var output = $('h2');
  var time = 0;
  var finalTime = 0;
  var t;      

  function startTimer() {
    t = window.setInterval(function() {
      time++;
      output.text("Seconds: " + time);
    }, 1000);
  }

  function endGame() {
    clearInterval(t);
    finalTime = time;
    document.getElementById("myTime").innerHTML = finalTime;
  }        

  function restart() {
    location.reload();
  }
</script>
@stop