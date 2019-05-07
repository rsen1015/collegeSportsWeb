
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<!--link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Create two equal columns that floats next to each other */
.column1 {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row1:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column1 {
    width: 100%;
  }
}
</style>

</head>

<body style="padding-top:20px;">
  
    
<?php
$q = $_GET["id"];
$con = mysqli_connect('localhost','root','','cricket');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$sql1="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team1 WHERE matchID = '".$q."'";
$sql2="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team2 WHERE matchID = '".$q."'";

$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);
$result9 = mysqli_query($con,$sql1);
?>
	
<?php	
echo "<div style=\"text-align:center;\">";
echo "<h1><b>Manage ScoreCard</b></h1>";
while($row = mysqli_fetch_array($result9)) {
        echo "<h4 style=\"font-size: 18px\">". $row["category"]." , Match ". $row["matchNumber"]." </h4>";
		$date = new DateTime($row["matchDate"]);
echo "<span style=\"font-size: 20px\">To be Played on : <b>".$date->format('d.m.Y')."</b> at <b>". $row["matchTime"] . " </b> <br>"; 
echo "MatchID : <b>".$row["matchID"]."</b></span><br>";
    }

    while($row = mysqli_fetch_array($result1)) {
        $val1=$row["team1"];$name1=$row["dept"];
    }
    while($row = mysqli_fetch_array($result2)) {
        $val2=$row["team2"];$name2=$row["dept"];
    }
$sql3="SELECT * FROM teaminfo WHERE teamID = '".$val1."'";  
$sql4="SELECT * FROM teaminfo WHERE teamID = '".$val2."'";
$result3 = mysqli_query($con,$sql3);
$result4 = mysqli_query($con,$sql4);


echo "<div class=\"row1\">";
   while($row = mysqli_fetch_array($result3)) {
  echo "<div class=\"column1\" style=\"background-color:".$row["deptColor"]."\">";
    echo "<a style=\"font-size:140px;color:white;\" href=\"scoreboard2.php?id=".$q."&teamID=".$row["teamID"]."\">".$row["dept"]."</a>";
  }
  echo "</div>";
   while($row = mysqli_fetch_array($result4)) {
  echo "<div class=\"column1\" style=\"background-color:".$row["deptColor"]."\">";
    echo "<a style=\"font-size:140px;color:white;\" href=\"scoreboard2.php?id=".$q."&teamID=".$row["teamID"]."\">".$row["dept"]."</a>";
    }
  echo "</div></div>";
mysqli_close($con);
?>
<br>
<br>
<h1>Click on the team Batting now</h1>

<div class="row">
  <div class="column"><a href="adminschedule.php"><button style="padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #330a19;color: white"><i class="fa fa-arrow-left" style="font-size:36px;color:white"></i><i>  Back to Schedule </i></button></a>
</div>
  <div class="column"><a href="playerstat1.php?id=<?php echo $q; ?>"><button style="padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #093029;color: white"><i><i class="fa fa-group" style="font-size:36px;color:white"></i> Player Stats</i></button></a>
</div>
  <div class="column"><a href="matchstatus1.php?id=<?php echo $q; ?>"><button style="padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #242d0a;color: white"><i>Match Status  <i class="fa fa-edit" style="font-size:36px;color:white"></i></i></button></a>
</div>
</div>

</div></body>
</html>



        