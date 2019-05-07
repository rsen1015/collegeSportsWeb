<?php

			$q=$val1=$val2=$toss="";
			$q = $_GET["id"];
			
			$con = mysqli_connect('localhost','root','','cricket');
			if (!$con) {
    			die('Could not connect: ' . mysqli_error($con));
			}


			$sql1="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team1 WHERE matchID = '".$q."'";
			$sql2="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team2 WHERE matchID = '".$q."'";
			$sql3="SELECT * FROM matchinfo WHERE matchID = '".$q."'";

			$result1 = mysqli_query($con,$sql1);
			$result2 = mysqli_query($con,$sql2);
			$result3 = mysqli_query($con,$sql3);
			while($row = mysqli_fetch_array($result1)) {
				$Category=$row["category"];$matchno=$row["matchNumber"];$matchTime=$row["matchTime"];$matchDate=$row["matchDate"];
        $val1=$row["team1"];$name1=$row["dept"];$fname1=$row["deptFullName"];$logo1=$row["logo"];$color1=$row["deptColor"];

    }
    while($row = mysqli_fetch_array($result2)) {
        $val2=$row["team2"];$name2=$row["dept"];$fname2=$row["deptFullName"];$logo2=$row["logo"];$color2=$row["deptColor"];
    }
    while($row = mysqli_fetch_array($result3)) {
        $toss=$row["toss"];$bat=$row["bat"];$bowl=$row["bowl"];$ump1=$row["umpire1"];$ump2=$row["umpire2"];
        $team1p=$row["team1playing11"];$team2p=$row["team2playing11"];
        $batCapt=$row["batCapt"];$bowlCapt=$row["bowlCapt"];$batWk=$row["batWk"];$bowlWk=$row["bowlWk"];
        $venue=$row["venue"];
    }


?>


<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script>
	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
	});
  </script>
  
  
<head>

<style>
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}

	
  .carousel-inner img {
      width: 90%;
      height: 400px;
  }
  .card {
		width: 73%;
		height:750px;
		align: center;
		}
 </style>
 
 
<nav class="navbar navbar-dark" style="background-color: black;">
	<h2 class="text-white" style="font-family: 'Old English Text MT', Times, serif;">St. Thomas' College of Engineering & Technology</h2>
	<p span style="color: white;">Intra college cricket tournament</span></p>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">CRICBASH</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	  <li class="nav-item dropdown">
		<div class="btn-group">
		<a href="cric1.php?id=<?php echo $q; ?>" class="btn" style="background-color: #770909;color: white;" role="button"><i class="fa fa-home w3-xlarge"></i> HOME</a>
		</div>&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="btn-group">
			<a href="info.php?id=<?php echo $q; ?>" class="btn" style="background-color: #770909;color: white;" role="button"><i class="fa fa-calendar w3-xlarge"></i> INFO</a>
		</div>&nbsp;&nbsp;&nbsp;&nbsp;
		<div class="btn-group">
			<a href="live.php?id=<?php echo $q; ?>" class="btn" style="background-color: #770909;color: white;" role="button"><i class="fa fa-calendar-check-o w3-xlarge"></i> LIVE</a>
		</div>
      </li>
	</ul>
	
  </div>
</nav>
</head>


<body style="background:url(scorewall.jpg);background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed">
<hr>
<?php if($toss!="")
    {
      
    
    ?>
<div class="row" style="color:white;text-align: center">
  <div class="column">
    <h2><?php echo $fname1; ?>(11)</h2><br>
    <p style="font-size: 20px;"><?php $arr1=explode(",",$team1p);foreach($arr1 as $value){
      $sql20="SELECT * FROM playerprofile WHERE playerID = '".$value."'";
      $result20 = mysqli_query($con,$sql20);
      while($row = mysqli_fetch_array($result20)) {
        $name=$row["name"];
    }
    echo $name;
    echo "<br>";
} ?></p>
  </div>
  <div class="column" style="font-size: 17px;"">
    <h2>Match Information</h2><br>
    <p>Match : <?php echo $Category.", Match ".$matchno; ?></p><br>
    <p>Series : STCET Intra College Tournament</p><br>
    <p>Date : <?php echo date("m.d.Y", strtotime($matchDate)); ?></p><br>
    <p>Time : <?php echo $matchTime; ?></p><br>
    <p>Toss : <?php if($toss == $bat && $val1 == $toss){echo $name1." elected to bat";}else if($toss == $bowl && $val1 == $toss){echo $name1." elected to bowl";}else if($toss == $bat && $val2 == $toss){echo $name2." elected to bat";}else if($toss == $bowl && $val2 == $toss){echo $name2." elected to bowl";}?></p><br>
    <p>Venue : <?php echo $venue; ?></p><br>
    <p>Umpires : <?php echo $ump1.",".$ump2; ?></p><br>

  </div>
  <div class="column">
    <h2><?php echo $fname2; ?>(11)</h2><br>
    <p style="font-size: 20px;"><?php $arr2=explode(",",$team2p);foreach($arr2 as $value){
      $sql20="SELECT * FROM playerprofile WHERE playerID = '".$value."'";
      $result20 = mysqli_query($con,$sql20);
      while($row = mysqli_fetch_array($result20)) {
        $name=$row["name"];
    }
    echo $name;
    echo "<br>";
} ?></p>
  </div>
</div>

<br><br><br><br><br><br><br><br><br>
<hr>
<?php 
  }
  else
  {
    echo "<h1 style=\"color:white;text-align:center;margin-top:200px;\">Toss yet to be done.</h1>";
  }
  mysqli_close($con);
?>
</body>
</html>
