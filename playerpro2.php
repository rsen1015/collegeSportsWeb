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
$a=$b="";
$sql1 = "SELECT deptColor FROM teaminfo where teamID = '".$q."'";
$sql2 = "SELECT playerID,name FROM playerprofile where team = '".$q."'";
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
while($row = mysqli_fetch_array($result1)) {
       $color = $row["deptColor"];
    
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


<body style="background-color: black;background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed;">
  <br>
  <p style="text-align:center;color:white;font-size:32px;">Meet The Team</p>
  <table style="width:100%;text-align: center;margin-top:30px;margin-left: 60px;">
    <?php 
  while($row = mysqli_fetch_array($result2)) {
       echo "<a href=\"playerpro.php?id=".$q."&playid=".$row["playerID"]."\"><tr>";
    echo "<div class=\"w3-panel w3-card-2\" style=\"margin-left: 150px;color:white;font-size:24px;background-color :".$color.";\"><p>".$row["name"]."</p></div>";
  echo "</tr></a>";
    
  }?>
  
</table>


</body>
</html>
