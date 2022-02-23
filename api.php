	<?php
	session_start();
	if(!isset($_SESSION["player_name"]) && !isset($_SESSION["Admin"]) ){
		header("location:index.php");
	}
	
	$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=guess_drawdb", "root", "");
	$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_POST["action"])){
	if(strcmp($_POST["action"], "get_mvp") != 0){
		$user=$_SESSION["player_name"];
	}
	$action=$_POST["action"];
	}
	if(isset($_POST["data"])){
		$data=$_POST["data"];
		
	}
	if(isset($_POST["word"])){
		$word=$_POST["word"];
	}
	if(isset($_POST["score"])){
		$score=$_POST["score"];
	}
	if(isset($_POST["type"])){
		$type=$_POST["type"];
	}
	if(isset($_POST["counter"])){
		$best_time=$_POST["counter"];
	}
	header("Content-Type: application/json");
	switch($action){
		
		case "choose":
			if(strcmp($data, "E") == 0)
			{
			$cursor = $MySQLdb->prepare("UPDATE players SET player_choose = :data,last_word =:word,points = :points  WHERE player_name =:player_name;");
			$cursor->execute(array(":player_name"=>$user,":data"=>$data ,":word"=> $word,":points"=>"1"));
			echo '{"success":"true"}';
			}elseif (strcmp($data, "M") == 0){
			$cursor = $MySQLdb->prepare("UPDATE players SET player_choose = :data,last_word =:word,points = :points  WHERE player_name =:player_name;");
			$cursor->execute(array(":player_name"=>$user,":data"=>$data ,":word"=> $word,":points"=>"3"));
			echo '{"success":"true"}';
			}
			elseif (strcmp($data, "H") == 0){
			$cursor = $MySQLdb->prepare("UPDATE players SET player_choose = :data,last_word =:word,points = :points  WHERE player_name =:player_name;");
			$cursor->execute(array(":player_name"=>$user,":data"=>$data ,":word"=> $word,":points"=>"5"));
			echo '{"success":"true"}';
			}
			break;

		case "get_word":
			$cursor = $MySQLdb->prepare("SELECT * FROM players Where player_name =:player_name;");
			$cursor->execute(array(":player_name"=>$user));
			foreach($cursor->fetchAll() as $row){
				if($row["player_name"] == $user){
					echo '{"success":"true","data":"'.$row['last_word'].'","type":"'.$row['player_choose'].'","time":"'.$row['best_time'].'","score":"'.$row['score'].'"}';
					break;						
				}else{
					echo '{"success":"false","data":"Word Not Found"}';
				}
			}
			break;

		case "update_score":
				$cursor = $MySQLdb->prepare("UPDATE players SET score =:score,best_time =:best_time WHERE player_name =:player_name;");
				$cursor->execute(array(":player_name"=>$user,":score"=>$score,":best_time"=>$best_time));
				echo '{"success":"true"}';
				break;



		case "get_mvp":
			$min_time=99999999999;
			$cursor = $MySQLdb->prepare("SELECT * FROM players;");
			$cursor->execute();
			foreach($cursor->fetchAll() as $row){
				if($min_time>((int)$row['best_time']))
				{
				$min_time=(int)$row['best_time'];
				}
			}
			$cursor = $MySQLdb->prepare("SELECT * FROM players Where best_time =:best_time;");
			$cursor->execute(array(":best_time"=>strval($min_time)));
			if($cursor->rowCount()){
				$return_vaule=$cursor->fetch();
				$mvp_name=$return_vaule["player_name"];
				$mvp_time=$return_vaule["best_time"];
				$mvp_score=$return_vaule["score"];
			}
			echo '{"success":"true","mvp_name":"'.$mvp_name.'","mvp_time":"'.$mvp_time.'","mvp_score":"'.$mvp_score.'"}';
			break;


		case "logout":
				session_destroy();
				echo '{"success":"true"}';
				break;
					
		default:
			echo '{"success":"false"}';
			die();
		
	}
	?>
   