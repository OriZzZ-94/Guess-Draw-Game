<?php 
session_start();
	if(!isset($_SESSION["player_name"])){
		header("location:index.php");
	}
	$user=$_SESSION["player_name"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Draw Guess Game</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .row {
 
    text-align: center;
    }

    </style>
</head>
<body class="w3-light-grey"> 
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well ">
             <h1>Please Choose Your Word:</h1>
            </div>
        </div>
    </div>
  </br></br></br></br></br></br></br></br></br></br></br></br>
    <div class="row">
    <div class="col-md-4">
      <h2><b>Easy Word - 1 Point</b></h2>
      </br></br>
          <button id='easy_btn' type="submit" class="btn btn-primary btn-block btn-lg">Start Game</button>
            </div>
        <div class="col-md-4">
        <h2><b>Medium Word - 3 Points</b></h2>
        </br></br>
          <button id='med_btn' type="submit" class="btn btn-primary btn-block btn-lg">Start Game</button>
            </div>
        <div class="col-md-4">
        <h2><b>Hard Word - 5 Poitns</b></h2>
        </br></br>
          <button id='hard_btn' type="submit" class="btn btn-primary btn-block btn-lg">Start Game</button>
            </div>
        </div>
    </div>
</div>

<!--Scripts -->
<script src="js\word_choosing_view.js"></script>
</body>
</html>
