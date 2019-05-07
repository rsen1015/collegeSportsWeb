<html>
<body>
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



$matchid = $toss = $bat = $bowl = $ump1 = $ump2 = $venue = $capt1 = $wk1 = $capt2 = $wk2 = $playing1 = $playing2 =$team1 = $team2 = $newPlay1 = $newPlay2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $matchid = $_POST["matchid"];
  $toss = $_POST["toss"];
  $bat = $_POST["bat"];
  $ump1 = $_POST["ump1"];
  $ump2 = $_POST["ump2"];
  $venue = $_POST["venue"];
  $capt1 = $_POST["capt1"];
  $wk1 = $_POST["wk1"];
  $capt2 = $_POST["capt2"];
  $wk2 = $_POST["wk2"];
  $playing1 = $_POST["Play1"];
   $newPlay1=  implode(",", $playing1);
  $playing2 = $_POST["Play2"];
  $newPlay2=  implode(",", $playing2);

}
$sql1="SELECT * FROM scheduled WHERE matchID = '".$matchid."'";
$result1 = mysqli_query($conn,$sql1);
 while($row = mysqli_fetch_array($result1)) {
        $team1=$row["team1"];$team2=$row["team2"];
    }
    if($team1==$bat)
    {
      $bowl=$team2;
    }
    else
    {
      $bowl=$team1;
    }
$sql = "INSERT INTO matchinfo VALUES(\"$matchid\",\"$toss\",\"$bat\",\"$bowl\",\"$ump1\",\"$ump2\",\"$newPlay1\",\"$newPlay2\",\"$capt1\",\"$wk1\",\"$capt2\",\"$wk2\",\"$venue\")";


if ($conn->query($sql) === TRUE) {
    echo "New Match has been edited successfully"; ?>
  <h3> <?php echo "To edit more matches click on Edit Match";?></h3>
    <br>
    <a href="/cric/adminschedule.php"><button>Edit Match</button></a>
<?php
} else {
	
    //echo "Error: " . $sql . "<br>" . $conn->error; ?>
    <h2> <?php echo "Something went wrong. Either you entered an incorrect or an incomplete data.";?></h2>
    <br>
    <h1> <?php echo "Please Enter all the fields correctly.";?></h1>
    <br>
    <?php echo "<a href=\"matchotrap.php?id=".$matchid."\"><button>Retry</button></a>";
    
}

$conn->close();
?>
</body>
</html>
