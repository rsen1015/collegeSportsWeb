
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<!--link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="/cric/checkbox.css">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
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
$sql3="SELECT * FROM playerprofile INNER JOIN scheduled ON team=team1 WHERE matchID = '".$q."'";
$sql4="SELECT * FROM playerprofile INNER JOIN scheduled ON team=team2 WHERE matchID = '".$q."'";

$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);
$result3 = mysqli_query($con,$sql3);
$result4 = mysqli_query($con,$sql3);
$result5 = mysqli_query($con,$sql4);
$result6 = mysqli_query($con,$sql4);
$result7 = mysqli_query($con,$sql3);
$result8 = mysqli_query($con,$sql4);
$result9 = mysqli_query($con,$sql1);
?>
	<form name="matedit" action="/cric/matchotrap2.php" method="post">
<?php	
echo "<div style=\"text-align:center;\">";
echo "<h1><b>Match Details</b></h1>";
while($row = mysqli_fetch_array($result9)) {
        echo "<h4 style=\"font-size: 18px\">". $row["category"]." , Match ". $row["matchNumber"]." </h4>";
echo "<span style=\"font-size: 20px\">To be Played on : <b>".date("m.d.Y", strtotime($row["matchDate"]))."</b> at <b>". $row["matchTime"] . " </b> <br>"; 
echo "MatchID : <b>".$row["matchID"]."</b></span><br>";
    }

    echo "</select><br>";
echo "Toss won by:<select name=\"toss\"><option value=\"\">Select a team:</option>";
    while($row = mysqli_fetch_array($result1)) {
        $val1=$row["team1"];$name1=$row["dept"];
       echo "<option value=\"" . $row["team1"] . "\">".$row["dept"]."</option>";
    }
    while($row = mysqli_fetch_array($result2)) {
        $val2=$row["team2"];$name2=$row["dept"];
       echo "<option value=\"" . $row["team2"] . "\">".$row["dept"]."</option>";
    }
    echo "</select><br>";



$sql5="SELECT * FROM playerprofile WHERE team = '".$val1."'";

$result10 = mysqli_query($con,$sql5);

$sql6="SELECT * FROM playerprofile WHERE team = '".$val2."'";

$result11 = mysqli_query($con,$sql6);




echo "Batting 1st:<select name=\"bat\"><option value=\"\">Select a team:</option>";
       echo "<option value=\"" . $val1 . "\">".$name1."</option>";
       echo "<option value=\"" . $val2 . "\">".$name2."</option>";
    echo "</select><br>";

echo "Umpire 1: <input type=\"name\" name=\"ump1\"><br>";
echo "Umpire 2: <input type=\"name\" name=\"ump2\"><br>";
echo "Venue: <input type=\"name\" name=\"venue\"><br>";
echo "<input type=\"hidden\" name=\"matchid\" value=\"".$q."\"><br>";

echo $name1."-Captain: <select name=\"capt1\"><option value=\"\">Select a Player:</option>";
    while($row = mysqli_fetch_array($result3)) {
       echo "<option value=\"" . $row["playerID"] . "\">".$row["name"]."(".$row["playerID"].")"."</option>";
    }
echo "</select>&emsp;";
echo $name1."-WicketKeeper: <select name=\"wk1\"><option value=\"\">Select a Player:</option>";
    while($row = mysqli_fetch_array($result4)) {
       echo "<option value=\"" . $row["playerID"] . "\">".$row["name"]."(".$row["playerID"].")"."</option>";
    }
    echo "</select><br>";

echo $name2."-Captain: <select name=\"capt2\"><option value=\"\">Select a Player:</option>";
    while($row = mysqli_fetch_array($result5)) {
       echo "<option value=\"" . $row["playerID"] . "\">".$row["name"]."(".$row["playerID"].")"."</option>";
    }
echo "</select>&emsp;";
echo $name2."-WicketKeeper: <select name=\"wk2\"><option value=\"\">Select a Player:</option>";
    while($row = mysqli_fetch_array($result6)) {
       echo "<option value=\"" . $row["playerID"] . "\">".$row["name"]."(".$row["playerID"].")"."</option>";
    }
    echo "</select><br>";
echo "</div>";

echo "<div align=\"center\"><h1>PLAYING E(11)EVEN</h1>";
echo "<div class=\"row\">
  <div class=\"column\" style=\"background-color:#aaa;\">
    <h2>".$name1."</h2>";
    while($row = mysqli_fetch_array($result10)) {
    	echo "<label class=\"container1\">";
       echo "<input type=\"checkbox\" id=\"Play1\" name=\"Play1[]\" value=\"" . $row["playerID"] . "\">".$row["name"]."(".$row["playerID"].")"."<br/>";
       echo "<span class=\"checkmark\"></span></label>";
    }
  echo "</div>
  <div class=\"column\" style=\"background-color:#bbb;\">
    <h2>".$name2."</h2>";
    while($row = mysqli_fetch_array($result11)) {
    	echo "<label class=\"container1\">";
       echo "<input type=\"checkbox\" id=\"Play2\" name=\"Play2[]\" value=\"" . $row["playerID"] . "\">".$row["name"]."(".$row["playerID"].")"."<br/>";
       echo "<span class=\"checkmark\"></span></label>";
    }
  echo "</div>
</div>";
mysqli_close($con);
?>
<br>
<button type="submit" name="submit" style="padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white">Add Match</button><br><br>
    </div></div>
    </form> 
</body>
</html>



        