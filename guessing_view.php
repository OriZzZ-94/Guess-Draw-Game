<!DOCTYPE html>
<html>
<head>
<title>Guessing View</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .row {
    text-align: center;
    }

    #guess_canvas {
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
    <div class="row">
        <div class="col-sm-12">
            <div class="well ">
             <h1>Please Guess The Draw</h1>
             <p id="count_sec"></p>
            </div>
        </div>
    </div>
  </br></br></br></br></br></br></br></br></br></br></br></br>
    <div class="row center">
        
     <canvas class="col-sm-12" id='guess_canvas' width="900" height="500">
      <img id='guess_pic' />


    </canvas>


    </div>
    </br></br></br></br></br></br></br></br></br></br></br></br>
    <div class="col-sm-12">
          <input id="p2_guess" type="text" class="form-control" name="p2_guess" placeholder="Your guess is...">
          </br>
          <div class="row">
          <div class="col-sm-6">
          <button  id= 'try_guess' type='submit' class="btn btn-primary btn-block">Send guess</button>
          </div>
          <div class="col-sm-6">
          <button  id= 'end_game' type='submit' class="btn btn-primary btn-block">End Game</button>
          </div>
          </div>
      </div>
      </div>
</div>
<script src="js\guessing_view.js"></script>
         
</body>
</html>