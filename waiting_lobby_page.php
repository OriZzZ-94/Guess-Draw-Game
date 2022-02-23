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
    <title>Waiting Room</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css\waiting_lobby_page.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="well ">
             <h1>Hey Welcome to The Waiting Room please wait....</h1>
             <h3> Refresh to Continue!</h3>	
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-sm-offset-3">
          <div id="my_animation"></div>
        </div>

    </div>
</div>


<script>

// On load:
var state = history.state || {};
var reloadCount = state.reloadCount || 0;
if (performance.navigation.type === 1) { // Reload
    state.reloadCount = ++reloadCount;
    history.replaceState(state, null, document.URL);
} else if (reloadCount) {
    delete state.reloadCount;
    reloadCount = 0;
    history.replaceState(state, null, document.URL);
}
if (reloadCount >= 1) {
    window.location.href = 'word_choosing_view.php';
}

</script>
</body>
</html>