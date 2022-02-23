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
<title>Drawing Canvas</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .row {
 
    text-align: center;
    }

#canvas {
    border: 2px solid black;
}
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
}
    </style>
</head>
<body class="w3-light-grey"> 
<div class="container">
    <div class="row center">
        <div class="col-sm-12 ">
            <div class="well ">
             <h1>Please Draw Your Choice</h1>
             <?php
             if (isset($_SESSION["word"]))
                echo "<h3><strong>".$_SESSION["word"]."</strong></h3>";

                ?>
            </div>
        </div>
    </div>
    </br></br></br></br>
    </br></br></br></br>
    <div class="row center">
        
    <div class="col-sm-12">

     <canvas id='canvas' width="900" height="500">



     </canvas>
     </div>


    </div>
    </br></br></br></br></br></br></br></br>
    <div class="row center">
    <div class="col-md-6 ">
          <button id='save_drawin' type="submit" class="btn btn-primary btn-block btn-lg">Send Drawing</button>
    </div>
    </div>
</div>

<!--Scripts -->
<script src="js/canvas.js"></script>
<script>
$("#save_drawin").click(function(){
    localStorage.setItem('DrawingCanvas', canvas.toDataURL());
    window.location.href = 'guessing_view.php';
});
</script>

</body>
</html>

