
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
$bat = $_GET["teamID"];
$con = mysqli_connect('localhost','root','','cricket');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$sql1="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team1 WHERE matchID = '".$q."'";
$sql2="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team2 WHERE matchID = '".$q."'";


$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);
$result3 = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result3)) {
  if($bat == $row["team1"])
  {
       $bowl = $row["team2"];
    
  }
  else
  {
        $bat = $row["team2"];
           $bowl = $row["team1"];
    
  }
}

$sql5="SELECT * FROM playerprofile WHERE team = '".$bat."'";
    $sql6="SELECT * FROM playerprofile WHERE team = '".$bowl."'";

$result9 = mysqli_query($con,$sql1);

$result10 = mysqli_query($con,$sql5);
$result11 = mysqli_query($con,$sql6);
$result12 = mysqli_query($con,$sql5);

?>
	<form name="score" action="/cric/scoreboard3.php" method="post">
<?php	
echo "<div style=\"text-align:center;\">";
echo "<h1><b>Manage ScoreCard</b></h1>";
while($row = mysqli_fetch_array($result9)) {
        echo "<h4 style=\"font-size: 18px\">". $row["category"]." , Match ". $row["matchNumber"]." </h4>";
echo "<span style=\"font-size: 20px\">To be Played on : <b>".$row["matchDate"]."</b> at <b>". $row["matchTime"] . " </b> <br><br>"; 
echo "<b>MatchID : ".$row["matchID"]."</b></span><input type=\"hidden\" name=\"matchid\" value=\"".$row["matchID"]."\"><br><br>";
  echo "<input type=\"hidden\" name=\"batid\" value=\"".$bat."\">";
  echo "<input type=\"hidden\" name=\"bowlid\" value=\"".$bowl."\">";
 
    }
echo "<div class=\"row\">
  <div class=\"column\" style=\"background-color:#aaa;\">";
    echo "<h2>Batting team   :  ".$bat."</h2><br>";

echo "<h3>Striker  :</h3>";
 while($row = mysqli_fetch_array($result10)) {
      echo "<label class=\"container1\">";
       echo "<input type=\"radio\" id=\"striker\" name=\"striker\" value=\"" . $row["playerID"] . "\">".$row["name"]."(".$row["playerID"].")"."<br/>";
       echo "<span class=\"checkmark\"></span></label>";
    }
   echo "<br><h3>Non-Striker  :</h3>";
 while($row = mysqli_fetch_array($result12)) {
      echo "<label class=\"container1\">";
       echo "<input type=\"radio\" id=\"nonstriker\" name=\"nonstriker\" value=\"" . $row["playerID"] . "\">".$row["name"]."(".$row["playerID"].")"."<br/>";
       echo "<span class=\"checkmark\"></span></label>";
    } 
echo "</div>
  <div class=\"column\" style=\"background-color:#bbb;\">";
    echo "<h2>Bowling team   :  ".$bowl."</h2><br>";

echo "<h3>Bowler  :</h3>";
 while($row = mysqli_fetch_array($result11)) {
      echo "<label class=\"container1\">";
       echo "<input type=\"radio\" id=\"bowler\" name=\"bowler\" value=\"" . $row["playerID"] . "\">".$row["name"]."(".$row["playerID"].")"."<br/>";
       echo "<span class=\"checkmark\"></span></label>";
    }
    echo "</div>
</div>";
    mysqli_close($con);
?>
<br>
<br>

<button type="submit" name="submit" style="padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white">Manage Score</button><br><br>
   </div> </form> </body>
</html>



        