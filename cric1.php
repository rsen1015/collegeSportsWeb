<?php

			$q = $_GET["id"];
			$runs1=$runs2=$balls1=$balls2=$wickets1=$wickets2=0;
			$toss=$bat=$bowl="";
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
				$matchno=$row["matchNumber"];$matchDate=date("m.d.Y", strtotime($row["matchDate"]));
        $val1=$row["team1"];$name1=$row["dept"];$fname1=$row["deptFullName"];$logo1=$row["logo"];$color1=$row["deptColor"];

    }
    while($row = mysqli_fetch_array($result2)) {
        $val2=$row["team2"];$name2=$row["dept"];$fname2=$row["deptFullName"];$logo2=$row["logo"];$color2=$row["deptColor"];
    }
    while($row = mysqli_fetch_array($result3)) {
        $toss=$row["toss"];$bat=$row["bat"];$bowl=$row["bowl"];
    }


    		$sql4="SELECT sum(no_of_balls) as balls,sum(runs) as runs,sum(wicket) as wickets FROM scorecard WHERE match_id = '".$q."' AND bat_team_id = '".$val1."'";
    		$sql5="SELECT sum(no_of_balls) as balls,sum(runs) as runs,sum(wicket) as wickets FROM scorecard WHERE match_id = '".$q."' AND bat_team_id = '".$val2."'";
    		$result4 = mysqli_query($con,$sql4);
			$result5 = mysqli_query($con,$sql5);
			while($row = mysqli_fetch_array($result4)) {
        $balls1=$row["balls"];$runs1=$row["runs"];$wickets1=$row["wickets"];
    }
    while($row = mysqli_fetch_array($result5)) {
        $balls2=$row["balls"];$runs2=$row["runs"];$wickets2=$row["wickets"];
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
	<meta http-equiv="Refresh" content="12">
 <style>
	
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
 
 
<nav class="navbar navbar-dark bg-dark">
	<h2 class="text-white" style="font-family: 'Old English Text MT', Times, serif;">St. Thomas' College of Engineering & Technology</h2>
	<p span class="text-info">Intra college cricket tournament</span></p>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">CRICBASH</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	  <li class="nav-item dropdown">
		<div class="btn-group">
		<a href="cric2.php" class="btn btn-secondary" role="button"><i class="fa fa-home w3-xlarge"></i> HOME</a>
		</div>
        <div class="btn-group">
			<button type="button" class="btn btn-secondary"><i class="fa fa-calendar w3-large"></i> FIXTURES</button>
			<button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Boy's Schedule</a>
				<a class="dropdown-item" href="#">Girl's Schedule</a>
			</div>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-secondary"><i class="fa fa-calendar-check-o w3-large"></i> RESULTS</button>
			<button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="pointstable.php">Boy's Results</a>
				<a class="dropdown-item" href="#">Girl's Results</a>
			</div>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-secondary"><i class="fa fa-group w3-large"></i> TEAMS</button>
			<button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="playerpro1.php"><i class="fa fa-male w3-xlarge"></i>   Boys</a>
				<a class="dropdown-item" href="#"><i class="fa fa-female w3-xlarge"></i> Girls</a>
			</div>
		</div>
      </li>
	</ul>
	
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit" data-toggle="tooltip" data-placement="top" title="Search Matches"><i class="fa fa-search w3-large"></i> Search</button>
    </form>
  </div>
</nav>
</head>


<body style="background:url(wallpaper3.jpg);background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed">

<marquee class="text-white" scrollamount="13.2"><h4><b><?php if($val1 == $toss){echo $fname1;}else if($val2 == $toss){echo $fname2;}else{echo " - ";} ?> won the toss and elected to <?php if($bat == $toss && $toss != ""){echo "Bat";}else if($bowl == $toss && $toss != ""){echo "Bowl";}else{echo " - ";} ?></b></h4></marquee>

<div class="card mx-auto d-block border border-dark">
  <div class="card-header bg-white text-secondary">
    <class="text-info"><h4><b> Match <?php echo $matchno; ?>/INTRA COLLEGE CRICKET TOURNAMENT/<?php echo $matchDate; ?> </b></h4>
  </div>
  
  <div class="card-body text-center">
	<div class="card-deck">
		<div class="card h-25 d-inline-block w-25 p-3" style="background-color: <?php echo $color1; ?>;">
			<img class="card-img-top" src="<?php echo $logo1; ?>" alt="teamIT" style="height:10% shadow-lg p-3 mb-5 bg-white rounded">
			<div class="card-body align="center">
			<p><h4 class="card-text text-dark" style="height:20%;text-transform: uppercase;"><b><?php echo $fname1; ?></b></h4></p>
			<div><h1 class="card-text text-white"><b><?php if($runs1 == ""){echo "0";}else{echo $runs1;} ?>/<?php if($wickets1 == ""){echo "0";}else{echo $wickets1;} ?></b></h1></div>
			<h3 class="card-text text-white">(<?php echo (int)($balls1/6).".".($balls1%6); ?>)</h3>
			</div>
		</div>
		<div class="card h-25 d-inline-block w-25 p-3" style="background-color: <?php echo $color2; ?>;">
			<img class="card-img-top" src="<?php echo $logo2; ?>" alt="teamCSE" style="height:10% shadow-lg p-3 mb-5 bg-white rounded">
			<div class="card-body text-white align="center"">
			<p><h4 class="card-text text-dark" style="height:20%;text-transform: uppercase;"><b><?php echo $fname2; ?></b></h4></p>
			<div><h1 class="card-text text-white"><b><?php if($runs2 == ""){echo "0";}else{echo $runs2;} ?>/<?php if($wickets2 == ""){echo "0";}else{echo $wickets2;} ?></b></h1></div>
			<h3 class="card-text text-white">(<?php echo (int)($balls2/6).".".($balls2%6); ?>)</h3>
			
		</div>
		</div>
	</div>
	<p><h4 class="card-text text-danger" align="center"><?php if($bowl == $val1 && $balls1>0){echo $name1." needs more ".($runs2-$runs1)." runs from ".(120-$balls1);}else if($bowl == $val2 && $balls2>0){echo $name1." needs more ".($runs1-$runs2)." runs from ".(120-$balls2);}else{if($val1 == $toss){echo $name1;}else if($val2 == $toss){echo $name2;}else{echo " - ";} ?> won the toss and elected to <?php if($bat == $toss && $toss != ""){echo "Bat";}else if($bowl == $toss && $toss != ""){echo "Bowl";}else{echo " - ";}}?></h4></p>
  </div>
  
  <div class="card-footer text-muted" align="right">
    <a href="cric2.php" class="btn btn-light">  SCHEDULE  </a>
	<a href="pointstable.php" class="btn btn-light">  POINTS TABLE  </a>
	<a href="live.php?id=<?php echo $q;?>" class="btn btn-danger"><h3><b>  LIVE  </b></h3></a>
  </div>
</div>

<marquee class="text-danger" hspace="180" vspace="10" scrolldelay="70" scrollamount="10" truespeed behavior="alternate"><font size="5"><b>Press LIVE button to get live updates</b></font></marquee>

<div class="container">
	<br>
		<div class="pl-0 font-italic text-white"><h2><b><u>TOP STORIES</u></b></h2></div>
	<br>
 </div>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner" align="center">
    <div class="carousel-item active">
      <img src="image1.png" class="img-thumbnail" width="100" height="50" alt="image1">
      <div class="carousel-caption">
        <h3>India tour of England</h3>
        <p>Back to red ball cricket!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="image2.jpeg" class="img-thumbnail" width="100" height="50" alt="image2">
      <div class="carousel-caption">
        <h3>Team England</h3>
        <p>Rashid's Test return a possibility -Bayliss</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="image3.jpg" class="img-thumbnail" width="100" height="50" alt="image3">
      <div class="carousel-caption">
        <h3>Team India</h3>
        <p>Pant receives maiden call-up for England Test series!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<?php mysqli_close($con);
?>
</body>
</html>
