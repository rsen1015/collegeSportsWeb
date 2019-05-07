<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<!--link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"-->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-2.1.0.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<style>

label.btn span {
  font-size: 1.5em ;
}

label input[type="radio"] ~ i.fa.fa-circle-o{
    color: #c8c8c8;    display: inline;
}
label input[type="radio"] ~ i.fa.fa-dot-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="radio"] ~ i.fa {
color: #7AA3CC;
}

label input[type="checkbox"] ~ i.fa.fa-square-o{
    color: #c8c8c8;    display: inline;
}
label input[type="checkbox"] ~ i.fa.fa-check-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="checkbox"] ~ i.fa {
color: #7AA3CC;
}

div[data-toggle="buttons"] label.active{
    color: #7AA3CC;
}

div[data-toggle="buttons"] label {
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 18px;
font-weight: normal;
line-height: 2em;
text-align: left;
white-space: nowrap;
vertical-align: top;
cursor: pointer;
background-color: none;
border: 0px solid 
#c8c8c8;
border-radius: 3px;
color: #c8c8c8;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
}

div[data-toggle="buttons"] label:hover {
color: #7AA3CC;
}

div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
-webkit-box-shadow: none;
box-shadow: none;
}


</style>
</head>

<body style="padding-top:20px;">
<?php
$con = mysqli_connect('localhost','root','','cricket');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


/*$sql1="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team1 WHERE matchID = '".$q."'";
$sql2="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team2 WHERE matchID = '".$q."'";


$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);
$result9 = mysqli_query($con,$sql1);*/

$balls = $ballsdeli = 0;
$matchid = $batid = $batid = $striker = $nonstriker = $bowler = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $matchid = $_POST["matchid"];
  $batid = $_POST["batid"];
  $bowlid = $_POST["bowlid"];
  $bowler = $_POST["bowler"];
  $striker = $_POST["striker"];
  $nonstriker = $_POST["nonstriker"];
}
$sql6="SELECT * FROM playerprofile WHERE team = '".$bowlid."'";
$result11 = mysqli_query($con,$sql6);

$sql20="SELECT sum(no_of_balls) FROM scorecard WHERE bat_team_id = '".$batid."' AND match_id = '".$matchid."'";
$result20 = mysqli_query($con,$sql20);
while($row = mysqli_fetch_array($result20)) {
       $balls = $row[0];
    
  }
$sql21="SELECT max(balls_delivered) FROM scorecard WHERE bat_team_id = '".$batid."' AND match_id = '".$matchid."'";
$result21 = mysqli_query($con,$sql21);
while($row = mysqli_fetch_array($result21)) {
       $ballsdeli = $row[0];
    
  }
//echo $matchid,$batid, $bowlid, $striker,$nonstriker,$bowler,$balls,$ballsdeli;

?>

<form name="scorebook" action="/cric/scoreboard4.php" method="post">
<?php 
echo "<div style=\"text-align:center;\">";
echo "<h1><b>ScoreBoard</b></h1>";
/*while($row = mysqli_fetch_array($result9)) {
        echo "<h4 style=\"font-size: 18px\">". $row["category"]." , Match ". $row["matchNumber"]." </h4>";
echo "<span style=\"font-size: 20px\">To be Played on : <b>".$row["matchDate"]."</b> at <b>". $row["matchTime"] . " </b> <br><br>"; */
echo "<b>MatchID : ".$matchid."</b></span><input type=\"hidden\" name=\"matchid\" value=\"".$matchid."\"><br><br>";
  echo "<input type=\"hidden\" name=\"batid\" value=\"".$batid."\">";
  echo "<input type=\"hidden\" name=\"bowler\" value=\"".$bowler."\">";
  echo "<input type=\"hidden\" name=\"bowlid\" value=\"".$bowlid."\">";
  echo "<input type=\"hidden\" name=\"striker\" value=\"".$striker."\">";
  echo "<input type=\"hidden\" name=\"nonstriker\" value=\"".$nonstriker."\">";
  echo "<input type=\"hidden\" name=\"balls\" value=\"".$balls."\">";
  echo "<input type=\"hidden\" name=\"ballsdeli\" value=\"".$ballsdeli."\">";
?>
<div class="container">
<div class="row">
    <div class="col-xs-12">
      <hr><h2><i>RUNS SCORED</i></h2>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" name='runs' value=0 checked><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>0</span>
        </label>
        <label class="btn">
          <input type="radio" name='runs' value=1><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span> 1</span>
        </label>
        <label class="btn">
          <input type="radio" name='runs' value=2><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span> 2</span>
        </label>
        <label class="btn">
          <input type="radio" name='runs' value=3><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span> 3</span>
        </label>
        <label class="btn">
          <input type="radio" name='runs' value=4><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span> 4</span>
        </label>
        <label class="btn">
          <input type="radio" name='runs' value=5><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span> 5</span>
        </label>
        <label class="btn">
          <input type="radio" name='runs' value=6><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span> 6</span>
        </label>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-xs-12">
      <hr><h2><i>BALL STATUS</i></h2>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" name='bowltype' value="Normal" checked><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>Normal Ball</span>
        </label>
        <label class="btn">
          <input type="radio" name='bowltype' value="Wide"><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>Wide Ball</span>
        </label>
        <label class="btn">
          <input type="radio" name='bowltype' value="No Ball"><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>No Ball</span>
        </label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <hr><h2><i>BALL PLAYED</i></h2>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" name='ballplayed' value="Bat" checked><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>With Bat</span>
        </label>
        <label class="btn">
          <input type="radio" name='ballplayed' value="Byes"><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>Byes</span>
        </label>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-xs-12">
      <hr><h2><i>WICKET</i></h2>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" name='wickettype' value="None" checked><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>Not Out</span>
        </label>
        <label class="btn">
          <input type="radio" name='wickettype' value="Bowled"><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>Bowled</span>
        </label>
        <label class="btn">
          <input type="radio" name='wickettype' value="Caught"><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>Caught</span>
        </label>
        <label class="btn">
          <input type="radio" name='wickettype' value="LBW"><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>LBW</span>
        </label>
        <label class="btn">
          <input type="radio" name='wickettype' value="Runout"><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>RunOut</span>
        </label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <hr><h2><i>FIELDER</i></h2>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" id="fielder" name="fielder" value="None" checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span>Boundary</span>
        </label>
   <?php
      while($row = mysqli_fetch_array($result11)) {
      echo "<label class=\"btn\">";
       echo "<input type=\"radio\" id=\"fielder\" name=\"fielder\" value=\"" . $row["playerID"] . "\"><i class=\"fa fa-circle-o fa-2x\"></i><i class=\"fa fa-check-circle-o fa-2x\"></i><span>".$row["name"]."(".$row["playerID"].")"."</span>
        </label>";
    }?>
    </div></div></div>
    <div class="row">
    <div class="col-xs-12">
      <hr><h2><i>BATSMAN DISMISSED</i></h2>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" id="batdismiss" name="batdismiss" value="None" checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span>None</span>
        </label>
        <?php
      echo "<label class=\"btn\">";
       echo "<input type=\"radio\" id=\"batdismiss\" name=\"batdismiss\" value=\"" . $striker . "\"><i class=\"fa fa-circle-o fa-2x\"></i><i class=\"fa fa-check-circle-o fa-2x\"></i><span>Striker</span>
        </label>";
        echo "<label class=\"btn\">";
       echo "<input type=\"radio\" id=\"batdismiss\" name=\"batdismiss\" value=\"" . $nonstriker . "\"><i class=\"fa fa-circle-o fa-2x\"></i><i class=\"fa fa-check-circle-o fa-2x\"></i><span>Non-Striker</span>
        </label>";
    ?>
    </div></div></div>
    <?php
    mysqli_close($con);
?>
</div><br><button type="submit" name="submit" style="padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white">Manage Score</button><br><br>
   </div> </form> </body>
</html>