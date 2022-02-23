<?php
session_start();
if(isset($_SESSION["player_name"])){
  Header("Location: word_choosing_view.php");
}else{
$_SESSION["Admin"]="true";
$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=guess_drawdb", "root", "");
$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['l_playername'])){
	
		$cursor = $MySQLdb->prepare("SELECT * FROM players WHERE player_name=:player_name");
		$cursor->execute( array(":player_name"=>$_POST["l_playername"]) );
		if($cursor->rowCount()){

            $return_vaule=$cursor->fetch();
            $_SESSION["player_name"]=$return_vaule["player_name"];
            $_SESSION["player_score"]=$return_vaule["player_score"];
            $_SESSION["player_points"]=$return_vaule["player_poitns"];
		}else{

			$cursor = $MySQLdb->prepare("INSERT INTO players (player_name,points,score,best_time) value (:player_name,:points,:score,:best_time)");
			$cursor->execute(array(":player_name"=>$_POST["l_playername"],":points"=>"0",":score"=>"0",":best_time"=>"999999999"));
			
		}
        Header("Location: waiting_lobby_page.php");
}
}
  
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
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="well ">
                <!--Headline -->
             <h1>Welcome to Drawing Guess Game</h1>
				
            </div>
        </div>
    </div>
    <!-- Open Screen Insert Name -->
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-info">
                    <img src='images\openscreen.png'>

                <div class="panel-body" id="login-panel">
                    <form action="#" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="l_playername" type="text" class="form-control" name="l_playername" placeholder="Insert Player Name">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Start Game</button>
                    </form>
                </div>
         
            </div>
        </div>
    </div>
    <!-- Mvp Score Front -->
    <div class="row">
    <div class="col-sm-6 col-md-offset-3">
    <img src='images\mvp_logo.png'width="100" height="100">

    </div>
    <div class="col-sm-6 col-md-offset-3">
    <h2><strong>MVP: </strong><span id="mvp_name"></span></h2>
    <h3><strong>Best Time: </strong><span id="mvp_time"></span> secs.</h3>
    <h3><strong>Score: </strong><span id="mvp_score"></span></h3>
    </div>

    </div>
</div>

<!-- Scripts -->
<script src="js\index.js">
</script>
</body>
</html>