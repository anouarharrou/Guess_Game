<?php 
session_start();
if ($_POST){
    header('Location:  http://localhost/php/Guess_Number/index2.php'); //redirect to index2.php
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
    <link rel="icon" href="icon.png" type="image/png">
    <title>Guess The Number</title>

</head>

<body>



    <form action="index2.php" method="post" style="margin:0 auto; width: 420px;">
        <h1>Guess the number</h1>
        <br>
        <fieldset>
            <div class="form-group ">
                <div class="col-sm-10">
                    <input type="text" name="username" required="required" placeholder="Username"
                        style="width: 100%;" />
                </div>
                <br>
                <div class="col-sm-10">
                    <p>Please Choose Difficulty Level :<br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="level" value="easy" checked="checked" />
                            Easy (1-10) with 5 guesses </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="level" value="medium" /> Medium (1-50)
                            with 10 guesses </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="level" value="hard" /> Hard (1-100) with
                            20 guesses </div>
                    </p>
                </div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary mb-2" value="start" style="width: 100%;">start</button>
                </div>
            </div>
        </fieldset>
    </form>

</body>

</html>