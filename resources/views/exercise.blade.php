<?php
require_once('css/do.php');
$conn = login();

if(isset($_POST['type'])) {
  $type = $_POST['type'];
  $query = ("select * from exercise where type = '$type'");
  $result = $conn->query($query);
  $i=1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout App</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/exercise.css">
</head>
<body>
    <div id='main' class="container-fluid">
        <h1>Workout App</h1>
        @foreach($exercises as $exercise)
        {{ $exercise->type }}
        @endforeach
        <form action="" method="post" class="form-inline">
           {{ csrf_field() }}
            <Select NAME="type" class="custom-select">
                <Option selected disabled>Choose routine</Option>
                <Option VALUE="cardio">Cardio</Option>
                <Option VALUE="circuit">Circuit</Option>
                <Option VALUE="abs">Abs</Option>
                <Option VALUE="stretch">Stretch</Option>
            </Select>
            <input type="submit" class="btn btn-success">
        </form>
        <div class="modal" id="myModal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2 id="exercise">&nbsp;</h2>
                </div>
                <div class="modal-body">
                    <h2 id="description">&nbsp;</h2>
                </div>
                <div class="modal-footer">
                    <h4 id="timer">&nbsp;</h4>
                    <button id="back" class="btn btn-primary">Back</button>
                    <button id="resume" class="btn btn-primary">Resume</button>
                    <button id="pause" class="btn btn-primary">Pause</button>
                    <button id="skip" class="btn btn-primary">Skip</button>
                    <button id="exit" class="btn btn-danger">Exit</button>
                </div>
            </div>
        </div>
        <audio id="audiotag1" src="css/fanfare.wav" preload="auto"></audio>
        <div id="routine">
        <?php 
            if(isset($result)) {
              echo <<<HERE
              <h2>Get Ready to Sweat!</h2>
              <h4>This app will cycle thru your selected workout routine and signal you when you need to start the next exercise.  Start to get loose, the 1st exercise is coming right up!</h4>
HERE;
              echo "<h2>".ucwords($type)."</h2>\n";
              echo "<button type='button' id='begin' class='btn btn-success'>Begin</button><br>\n";
              while($row=$result->pg_fetch_assoc()) {
                  echo "<p id='name".$i."' class='group".$row['group']." for-display ex-name'>".ucwords($row['name'])."</p><br>\n";
                  echo "<p id='desc".$i."' class='group".$row['group']." for-display ex-desc'>".$row['description']."</p><br>\n";
                  $i++;
              }     
            }
        ?>
        </div>
    </div>    
<script>
$(function() {
    //declare variables
    //get the modal
    var modal = document.getElementById('myModal');
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // Get the #name element in the modal
    var exercise = document.getElementById("exercise");
    // Get the #description element in the modal
    var desc = document.getElementById("description");
    // Get the audio file
    var audio = document.getElementById('audiotag1');
    //get the total exercise elements
    var excTotal = document.querySelectorAll('#routine .for-display').length;
    //initialize counter
    var excCounter = 1;
    //get the timer output
    var output = $('#timer');
    //initialize pause button
    var isPaused = false;
    //initialize timer
    var time = 60; 
    
    $( "#begin" ).click(function() {
        audio.play();
        exercise.innerHTML = document.getElementById("name1").innerHTML;
        desc.innerHTML = document.getElementById("desc1").innerHTML;
        modal.style.display = "block";
        $(".btn-primary").show();
        $(".btn-danger").hide();
        time = 60;
        excCounter = 1;
        startTimer();        
    }); //end of begin click function
    
    $('#pause').on('click', function(e) {
        e.preventDefault();
        isPaused = true;
    });  //end of pause click function

    $('#resume').on('click', function(e) {
        e.preventDefault();
        isPaused = false;
    });  //end of resume click function
    
    $('#skip').on('click', function(e) {
        e.preventDefault();
        if(excCounter == excTotal / 2){
            time = 1;
        } else {
            nextExercise();
        }
    });  //end of skip click function
    
    $('#back').on('click', function(e) {
        e.preventDefault();
        if(excCounter != 1) {
            prevExercise();
        }
    });  //end of back click function
    
    $('#exit').on('click', function(e) {
        e.preventDefault();
        modal.style.display = "none";
    });  //end of resume click function
    
    function startTimer() {
        var t = window.setInterval(function() {
            if((time == 0) && (excCounter == excTotal / 2)) {
                finished();
                clearInterval(t);
                output.text("You may now exit");
            }
            if(time == 0) {
                nextExercise();
            }
            if(!isPaused) {
                time--;
                output.text("Seconds Left: " + time);
            }
        }, 1000);
    } //end of startTimer function
    
    function nextExercise() {
        time = 60;
        excCounter += 1;
        exercise.innerHTML = document.getElementById("name" + excCounter).innerHTML;
        desc.innerHTML = document.getElementById("desc" + excCounter).innerHTML;
        modal.style.display = "block";
        audio.play();
    } //end of nextExercise function
    
    function prevExercise() {
        time = 60;
        excCounter -= 1;
        exercise.innerHTML = document.getElementById("name" + excCounter).innerHTML;
        desc.innerHTML = document.getElementById("desc" + excCounter).innerHTML;
        modal.style.display = "block";
        audio.play();
    } //end of prevExercise function
    
    function finished() {
        exercise.innerHTML = "Congratulations!!!  You have finished the Workout!!";
        desc.innerHTML = "Exercise is completed";
        modal.style.display = "block";
        audio.play();
        $(".btn-primary").hide();
        $(".btn-danger").show();
    }  //end of finished function
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        time = 0;
        excCounter = excTotal / 2;
    }  //end of span onclick function

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            time = 0;
            excCounter = excTotal / 2;
        }
    }  //end of window onclick function
    
}); //end of ready function   
    
</script>
</body>
</html>		