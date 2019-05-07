<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

</head>
<body>
<?php
$matchid = $_GET["id"];
$q = $_GET["playid"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cricket";

$conn = mysqli_connect('localhost','root','','cricket');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql1="SELECT sum(runs) AS Runs,count(*) As Balls FROM scorecard WHERE match_id = '".$matchid."' AND striker = '".$q."'";
$sql2="SELECT count(*) AS Fours FROM scorecard WHERE match_id = '".$matchid."' AND striker = '".$q."' AND runs = 4 AND ball_struck = 'Bat'";
$sql3="SELECT count(*) AS Sixes FROM scorecard WHERE match_id = '".$matchid."' AND striker = '".$q."' AND runs = 6 AND ball_struck = 'Bat'";
$sql4="SELECT count(*) AS Dismiss FROM scorecard WHERE match_id = '".$matchid."' AND player_dismissed = '".$q."'";

$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);
$result3 = mysqli_query($conn,$sql3);
$result4 = mysqli_query($conn,$sql4);

$runs = $innings = $balls = $sixes = $fours =  $fifties  = $hundred = $notout  = $v = $hs= 0;


while($row = mysqli_fetch_array($result4)) {
    $notout=$row["Dismiss"];
  }
while($row = mysqli_fetch_array($result1)) {
    $runs=$row["Runs"];$balls=$row["Balls"];
  }
if($balls > 0)
{
  $innings = 1;
  if($notout == 0)
  {
    $notout = 1;
  }
  else
  {$notout = 0;}
}
while($row = mysqli_fetch_array($result2)) {
    $fours=$row["Fours"];
  }
  while($row = mysqli_fetch_array($result3)) {
    $sixes=$row["Sixes"];
  }
  if($runs>49)
  {
    $fifties=1;
    if($runs>99)
    {$hundred =1;}
  }

  //echo $runs,$innings, $balls, $sixes, $fours, $fifties, $hundred, $notout;
$sql5="SELECT * FROM batstat WHERE playerID = '".$q."'";

$result5 = mysqli_query($conn,$sql5);

while($row = mysqli_fetch_array($result5)) {
    $innings+=$row[1];
    $v=$row[2];
    $runs+=$v;
    $balls+=$row[3];
    $sixes+=$row[4];
    $fours+=$row[5];
    $fifties+=$row[6];
    $hundred+=$row[7];
    $notout+=$row[8];
    $hs=$row[9];
  }
  if($runs-$v>$hs)
      {$hs=$runs-$v;
      }


$sql20="UPDATE batstat SET innings=".$innings.",runs=".$runs.",balls=".$balls.",sixes=".$sixes.",fours=".$fours.",fifties=".$fifties.",hundred=".$hundred.",notout=".$notout.",hs=".$hs." WHERE playerID='".$q."'";

/*UPDATE batstat
SET innings = $innings, runs= $runs, balls = $balls, sixes = $sixes, fours= $fours,fifties = $fifties,hundred = $hundred, notout= $notout
WHERE playerID = 1;

$sql = "INSERT INTO scorecard VALUES(\"$matchid\",\"$batid\",$ballsdeli,$noofball,\"$bowltype\",$runs,\"$ballplayed\",\"$striker\",\"$nonstriker\",$wickets,\"$wickettype\",\"$bowler\",\"$fielder\",\"$batdismiss\",CURRENT_TIMESTAMP)";*/







$sql11="SELECT sum(runs) AS Runs,count(*) As Balls FROM scorecard WHERE match_id = '".$matchid."' AND bowler = '".$q."' AND ball_type = 'Normal'";
$sql12="SELECT count(*) AS Wickets FROM scorecard WHERE match_id = '".$matchid."' AND bowler = '".$q."' AND wicket = 1 AND wicket_type <> 'Runout' ";
$sql13="SELECT count(*) As Dots FROM scorecard WHERE match_id = '".$matchid."' AND bowler = '".$q."' AND runs = 0";
$sql14="SELECT count(*) AS Catches FROM scorecard WHERE match_id = '".$matchid."' AND fielder = '".$q."' AND wicket = 1 AND wicket_type <> 'Runout' ";
$sql15="SELECT count(*) AS Runouts FROM scorecard WHERE match_id = '".$matchid."' AND fielder = '".$q."' AND wicket = 1 AND wicket_type = 'Runout' ";

$result11 = mysqli_query($conn,$sql11);
$result12 = mysqli_query($conn,$sql12);
$result13 = mysqli_query($conn,$sql13);
$result14 = mysqli_query($conn,$sql14);
$result15 = mysqli_query($conn,$sql15);
$runs = $innings = $balls = $dots = $catches =  $wickets  = $runouts  = 0;


while($row = mysqli_fetch_array($result14)) {
    $catches=$row["Catches"];
  }
  while($row = mysqli_fetch_array($result15)) {
    $runouts=$row["Runouts"];
  }
while($row = mysqli_fetch_array($result11)) {
    $runs=$row["Runs"];$balls=$row["Balls"];
  }
if($balls > 0)
{
  $innings = 1;
}
while($row = mysqli_fetch_array($result12)) {
    $wickets=$row["Wickets"];
  }
  while($row = mysqli_fetch_array($result13)) {
    $dots=$row["Dots"];
  }

  //echo $runs,$innings, $balls, $sixes, $fours, $fifties, $hundred, $notout;
$sql6="SELECT * FROM bowlstat WHERE playerID = '".$q."'";

$result16 = mysqli_query($conn,$sql6);

while($row = mysqli_fetch_array($result16)) {
    $innings+=$row[1];
    $wickets+=$row[2];
    $runs+=$row[3];
    $balls+=$row[4];
    $dots+=$row[5];
    $catches+=$row[6];
    $runouts+=$row[7];
  }


$sql21="UPDATE bowlstat SET innings=".$innings.",wickets=".$wickets.",runs=".$runs.",balls=".$balls.",dots=".$dots.",catches=".$catches.",runouts=".$runouts." WHERE playerID='".$q."'";














if ($conn->query($sql20) === TRUE && $conn->query($sql21) === TRUE) {
    echo "Player Stats has been updated successfully"; ?>
  
  <h1> <?php echo "Go to Scoreboard ";?></h1>
    
    <?php echo "<a href=\"scoreboard1.php?id=".$matchid."\"><button style=\"padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white\"><i>Scoreboard</i></button></a>";?>


  <h1> <?php echo "Back to Player List ";?></h1>
    
    <?php echo "<a href=\"playerstat1.php?id=".$matchid."\"><button style=\"padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white\"><i>Player List</i></button></a>";?>
<?php
} else {
	
    //echo "Error: " . $sql . "<br>" . $conn->error; ?>
    <h2> <?php echo "Something went wrong. Either you entered an incorrect or an incomplete data.";?></h2>
    <br>
    <h1> <?php echo "Please Enter all the fields correctly.";?></h1>
    <br>
    <?php //echo "<a href=\"scoreboard1.php?id=".$matchid."\"><button>Retry</button></a>";
    
}

$conn->close();
?>
</body>
</html>
