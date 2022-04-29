<?php 
session_start();
if(isset($_POST['username']) || isset($_POST['level'])) {
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['level'] = $_POST['level'];
} 


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Welcome <?php echo $_SESSION['username'] ?></title>
  <link rel="icon" href="icon.png" type="image/png">
</head>

<body>

  <?php 

if (isset($_SESSION['username']) and isset($_SESSION['level'])){
  
  
    if (isset($_POST["submitButton" ]) and isset($_POST["guess" ])) {
        processForm();  } 
        else {
    switch ($_SESSION['level']){
        case($_SESSION['level']=='easy'):    
        displayForm(rand(1, 10),5,20);
        break;
       case($_SESSION['level']=='medium'):
        displayForm(rand(1, 50),10,20);
       break;   
       case($_SESSION['level']=='hard'):
        displayForm(rand(1, 100),20,20);
        break; 
    }
}

}



function processForm() {
  
   
    //score record
    if ($_SESSION['level']=='easy'){
    $_SESSION['score'] = (int)$_POST["score"]-4;
    $score = $_SESSION['score']; 
    guessMsg();
  } else if ($_SESSION['level']=='medium') {
    $_SESSION['score'] = (int)$_POST["score"]-2;
    $score = $_SESSION['score']; 
    guessMsg();
  } else if ($_SESSION['level']=='hard') {
    $_SESSION['score'] = (int)$_POST["score"]-1;
    $score = $_SESSION['score'];
    guessMsg();
  }

    

 
  }
    
// displayForm message    
 function displayForm($number, $guessesLeft,$score, $message="" ) {
    ?>
  <form action="index2.php" method="post" style="margin:0 auto; width: 420px;">
    <fieldset>
      <div class="form-group ">
        <input type="hidden" name="number" value="<?php echo $number?>" />
        <input type="hidden" name="guessesLeft" value="<?php echo $guessesLeft?>" />
        <input type="hidden" name="score" value="<?php echo $score?>" />
        <h2>Welcome <?php echo $_SESSION['username']  ?></h2> <br>
        <p>You Have Choosed The Difficulty: <?php echo $_SESSION['level']  ?></p> <br>
        <p> You have <?php echo $guessesLeft?> <?php echo ($guessesLeft == 1) ?" try" :" tries" ?> left to guess it!</p>
        <p>What's your guess? <input type="number" name="guess" value="" />
          <div class="col-sm-10">
            <input type="submit" name="submitButton" value="Guess" class="btn btn-primary mb-2" style="width: 100%;" />
          </div> <br>
          <div class="alert alert-info"><?php if ($message) echo "$message" ?></div>

      </div>
    </fieldset>
  </form>
  <?php
   }
   // success message
   function displaySuccess($number,$score) {
   ?> <form style="margin:0 auto; width: 420px;">
    <fieldset>
      <div class="form-group ">
        <h2>Congratulations!</h2>
        <div class="col-sm-10">
          <p>You guessed my number: <?php echo $number?></p>
          <p>Your score is : <?php echo $score?></p>
        </div>
        <div class="col-sm-10">
          <form action="" method="post">
            <p><input class="btn btn-primary" type="submit" name="tryAgain" value="Try Again" /></p>
          </form>
        </div>
      </div>
    </fieldset>
  </form>
  <?php
   }
   
   // failure message
   function displayFailure($number) {
   ?>
  <form style="margin:0 auto; width: 420px;">
    <fieldset>
      <div class="form-group ">
        <h2>Bad luck!</h2>
        <div class="col-sm-10">
          <p>You ran out of guesses. My number was <?php echo $number?>!</p>
        </div>
        <div class="col-sm-10">
          <form action="" method="post">
            <p><input class="btn btn-primary" type="submit" name="tryAgain" value="Try Again" /></p>
          </form>
        </div>
      </div>
    </fieldset>
    <?php
   }

   function guessMsg(){
    
    global $score;
    $_SESSION['number'] = (int)$_POST["number" ];
    $number = $_SESSION['number'];
    $_SESSION['guessesLeft'] = (int)$_POST["guessesLeft"]-1;
    $guessesLeft = $_SESSION['guessesLeft'];
    $_SESSION['guess'] = (int)$_POST["guess" ];
    $guess = $_SESSION['guess'];

    if ($guess == $number) {
      displaySuccess($number,$score);
    } elseif ($guessesLeft == 0) {
      displayFailure($number);
      $score = 0;
    } elseif ($guess <$number) {
      displayForm($number, $guessesLeft,$score,"You're Guess ($guess) is too low-try again!" );
    } else {
      displayForm($number, $guessesLeft,$score,"You're Guess ($guess) is too high-try again!" );
    }

   }
   ?>
</body>

</html>