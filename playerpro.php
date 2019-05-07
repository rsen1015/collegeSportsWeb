<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cricket";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$q = $_GET["id"];
$p = $_GET["playid"];
$innings=$runs=$balls=$sixes=$fours=$fifties=$hundred=$notout=0;
$innings1=$wickets1=$runs1=$balls1=$dots1=$catches1=$runouts1=0;
$name=$dob=$role=$batstyle=$bowlstyle=$debutoppteam=$year="";
$sql1 = "SELECT deptColor FROM teaminfo where teamID = '".$q."'";
$sql2 = "SELECT * FROM playerprofile inner join teaminfo on debutoppteam=teamID where playerID = '".$p."'";
$sql3 = "SELECT * FROM batstat where playerID = '".$p."'";
$sql4 = "SELECT * FROM bowlstat where playerID = '".$p."'";
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
while($row = mysqli_fetch_array($result1)) {
       $color = $row["deptColor"];
    
  }
  while($row = mysqli_fetch_array($result2)) {
       $name=$row["name"];
       $dob=$row["dob"];
       $role=$row["role"];
       $batstyle=$row["batstyle"];
       $bowlstyle=$row["bowlstyle"];
       $debutoppteam=$row["dept"];
        $year=$row["year"];
  }
  while($row = mysqli_fetch_array($result3)) {
       $innings=$row["innings"];
       $runs=$row["runs"];
       $balls=$row["balls"];
       $sixes=$row["sixes"];
       $fours=$row["fours"];
       $fifties=$row["fifties"];
       $hundred=$row["hundred"];
       $notout=$row["notout"];
       $hs=$row["hs"];
  }
  while($row = mysqli_fetch_array($result4)) {
       $innings1=$row["innings"];
       $wickets1=$row["wickets"];
       $runs1=$row["runs"];
       $balls1=$row["balls"];
       $dots1=$row["dots"];
       $catches1=$row["catches"];
       $runouts1=$row["runouts"];
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

<nav class="navbar navbar-dark bg-dark">
	<p style="padding-bottom :10px;font-size: 40px;font-family: 'Old English Text MT', Times, serif;" class="text-white">St. Thomas' College of Engineering & Technology</p>
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
	
  </div>
</nav>
</head>


<body style="background: linear-gradient(to bottom,black,black, <?php echo $color; ?>);background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed;">


<div>
<div style="width:100%;height:100%;position:absolute;vertical-align:middle;text-align:right;color:white;">

  <p style="padding-right:50px;padding-top:30px;font-size:44px;font-family:'Arial Black', Gadget, sans-serif;"><?php echo $name; ?></p>
  <hr style="margin-left: 600px;margin-right: 40px;padding-right:50px;padding-top:10px;">
  <br>
  <table style="margin-left: 600px;text-align:center;"width="60%">
  <tr style="font-size:18px;">
    <th>Matches</th>
    <th>Runs</th>
    <th>High Score</th>
    <th>Wickets</th>
  </tr>
  <tr style="font-size:32px;">
    <td width="20%"><b><?php echo $innings; ?></b></td>
    <td width="20%"><b><?php echo $runs; ?></b></td>
    <td width="20%"><b></b><?php echo $hs; ?></td>
    <td width="20%"><b><?php echo $wickets1; ?></b></td>
    
  </tr>

</table>
<br>
<p style="padding-left:50px;padding-top:30px;text-align:left;"><b><i>BIOGRAPHY</i></b></p>
<hr style="margin-left: 40px;margin-right: 40px;padding-right:50px;padding-top:10px;">

<br>
  <table style="margin-left: 675px;text-align:left;font-size:20px;font-family: monospace;"width="60%">
  <tr>
    <th width="50%">DOB</th>
    <td width="50%"><?php $date = new DateTime($dob);echo $date->format('d.m.Y');  ?></td>
  </tr>
  <tr>
    <th width="50%">Position</th>
    <td width="50%"><?php echo $role; ?></td>
  </tr>
  <tr>
    <th width="50%">Batting Style</th>
    <td width="50%"><?php echo $batstyle; ?></td>
  </tr>
  <tr>
    <th width="50%">Bowling Style</th>
    <td width="50%"><?php echo $bowlstyle; ?></td>
  </tr>
  <tr>
    <th width="50%">Year</th>
    <td width="50%"><?php echo $year; ?></td>
  </tr>
  <tr>
    <th width="50%">Debut Opponent Team</th>
    <td width="50%"><?php echo $debutoppteam; ?></td>
  </tr>
</table>
<br>
<hr style="margin-left: 40px;margin-right: 40px;padding-right:50px;padding-top:10px;">
<p style="padding-left:50px;padding-top:0px;text-align:center;color:black;font-size:24px;"><b style="color:white;">INTER-DEPARTMENT LEAGUE CAREER STATS</b></p>
<hr style="margin-left: 40px;margin-right: 40px;padding-right:50px;padding-top:10px;">

  <br>
<p style="padding-left:50px;padding-top:30px;text-align:left;font-size:18px;color:white;"><b><i>BATTING</i></b></p>
<hr style="margin-left: 40px;margin-right: 40px;padding-right:50px;padding-top:10px;">
<br>

<table style="text-align:center;color:white;"width="100%">
  <tr style="font-size:18px;">
    <th>Innings</th>
    <th>Runs</th>
    <th>Strike Rate</th>
    <th>Average</th>
    <th>High Score</th>
    <th>6s</th>
    <th>4s</th>
    <th>Balls Faced</th>
    <th>Not-Outs</th>
    <th>50s</th>
  </tr>
  <tr style="font-size:24px;">
    <td width="10%"><b><?php echo $innings; ?></b></td>
    <td width="10%"><b><?php echo $runs; ?></b></td>
    <td width="10%"><b><?php if($runs>0 && $balls>0){echo $runs/$balls*100;}else{echo "-";} ?></b></td>
    <td width="10%"><b><?php if($runs>0 && $innings>0){echo $runs/$innings;}else{echo "-";} ?></b></td>
    <td width="10%"><b><?php echo $hs; ?></b></td>
    <td width="10%"><b><?php echo $sixes; ?></b></td>
    <td width="10%"><b><?php echo $fours; ?></b></td>
    <td width="10%"><b><?php echo $balls; ?></b></td>
    <td width="10%"><b><?php echo $notout; ?></b></td>
    <td width="10%"><b><?php echo $fifties; ?></b></td>
  </tr>

</table>


 <br><br>
<p style="padding-left:50px;padding-top:30px;text-align:left;color:white;font-size:18px;"><b><i>BOWLING</i></b></p>
<hr style="margin-left: 40px;margin-right: 40px;padding-right:50px;padding-top:10px;">
<br>

<table style="text-align:center;color:white;"width="100%">
  <tr style="font-size:18px;">
    <th>Innings</th>
    <th>Wickets</th>
    <th>Runs</th>
    <th>Dots</th>
    <th>Economy Rate</th>
    <th>Average</th>
    <th>Strike Rate</th>
    <th>Balls Bowled</th>
  </tr>
  <tr style="font-size:24px;">
    <td width="8%"><b><?php echo $innings1; ?></b></td>
    <td width="8%"><b><?php echo $wickets1; ?></b></td>
    <td width="8%"><b><?php echo $runs1; ?></b></td>
    <td width="8%"><b><?php echo $dots1; ?></b></td>
    <td width="10%"><b><?php if($runs1>0 && $balls1>0){echo $runs1/$balls1*6;}else{echo "-";} ?></b></td>
    <td width="10%"><b><?php if($runs1>0 && $wickets1>0){echo $runs1/$wickets1;}else{echo "-";} ?></b></td>
    <td width="10%"><b><?php if($wickets1>0 && $balls1>0){echo $balls1/$wickets1;}else{echo "-";} ?></b></td>
    <td width="10%"><b><?php echo $balls1; ?></b></td>
  </tr>

</table>


<br><br>
<p style="padding-left:50px;padding-top:30px;text-align:left;color:white;font-size:18px;"><b><i>FIELDING</i></b></p>
<hr style="margin-left: 40px;margin-right: 40px;padding-right:50px;padding-top:10px;">
<br>

<table style="text-align:center;color:white;"width="100%">
  <tr style="font-size:18px;">
    <th>Catches</th>
    <th>Run Outs</th>
  </tr>
  <tr style="font-size:24px;">
    <td width="50%"><b><?php echo $catches1; ?></b></td>
    <td width="50%"><b><?php echo $runouts1; ?></b></td>
  </tr>

</table>

<br><br><br>


</div>
</body>
</html>
