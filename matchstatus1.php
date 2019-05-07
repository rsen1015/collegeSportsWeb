
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
$q = $_GET["id"];
$con = mysqli_connect('localhost','root','','cricket');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$sql1="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team1 WHERE matchID = '".$q."'";
$sql2="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team2 WHERE matchID = '".$q."'";

$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);

while($row = mysqli_fetch_array($result1)) {
    $val1=$row["teamID"];$name1=$row["dept"];
  }
  while($row = mysqli_fetch_array($result2)) {
    $val2=$row["teamID"];$name2=$row["dept"];
  }
?>

<form name="summary" action="/cric/matchstatus2.php" method="post">
<?php 
echo "<div style=\"text-align:center;\">";
echo "<h1><b>MATCH SUMMARY</b></h1>";
echo "<b>MatchID : ".$q."</b></span><input type=\"hidden\" name=\"matchid\" value=\"".$q."\"><br><br>";?>
  <div class="container">

<div class="row">
    <div class="col-xs-12">
      <hr><h2><i>STATUS</i></h2>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" name='status' value="unplayed" checked><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>Un-Played</span>
        </label>
        <label class="btn">
          <input type="radio" name='status' value="played"><i class="fa fa-circle-o fa-3x"></i><i class="fa fa-check-circle-o fa-3x"></i><span>Played</span>
        </label>
      </div>
    </div>
  </div>




  <div class="row">
    <div class="col-xs-12">
      <hr><h2><i>MATCH WON BY</i></h2>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" id="matchwon" name="matchwon" value="None" checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span>It's a Tie</span>
        </label>
        <?php
      echo "<label class=\"btn\">";
       echo "<input type=\"radio\" id=\"matchwon\" name=\"matchwon\" value=\"" . $name1 . "\"><i class=\"fa fa-circle-o fa-2x\"></i><i class=\"fa fa-check-circle-o fa-2x\"></i><span>".$name1."</span>
        </label>";
        echo "<label class=\"btn\">";
       echo "<input type=\"radio\" id=\"matchwon\" name=\"matchwon\" value=\"" . $name2 . "\"><i class=\"fa fa-circle-o fa-2x\"></i><i class=\"fa fa-check-circle-o fa-2x\"></i><span>".$name2."</span>
        </label>";
    ?>
    </div></div></div>



<div class="row">
    <div class="col-xs-12">
      <hr><h2><i>LOSING TEAM</i></h2>
      <div class="btn-group" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" id="matchlost" name="matchlost" value="None" checked><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-check-circle-o fa-2x"></i><span>It's a Tie</span>
        </label>
        <?php
      echo "<label class=\"btn\">";
       echo "<input type=\"radio\" id=\"matchlost\" name=\"matchlost\" value=\"" . $name1 . "\"><i class=\"fa fa-circle-o fa-2x\"></i><i class=\"fa fa-check-circle-o fa-2x\"></i><span>".$name1."</span>
        </label>";
        echo "<label class=\"btn\">";
       echo "<input type=\"radio\" id=\"matchlost\" name=\"matchlost\" value=\"" . $name2 . "\"><i class=\"fa fa-circle-o fa-2x\"></i><i class=\"fa fa-check-circle-o fa-2x\"></i><span>".$name2."</span>
        </label>";
    ?>
    </div></div></div>


    Runs(if any) Won By <input type="text" name="runs" value="None"><br><br>
    Wickets(if any) Won By <input type="text" name="wickets" value="None"><br><br>

    </div><br><button type="submit" name="submit" style="padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white">Submit Summary</button><br><br>
    </form> 
    </div>
</body>
</html>



        