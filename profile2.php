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

$category = $matchNo = $matchday = $matchtime = $team1 = $team2 = $matchtype = $matchID =$year = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $playerID = $_POST["playerID"];
  $playername = $_POST["playername"];
  $team = $_POST["team"];
  $dob = $_POST["dob"];
  $role = $_POST["role"];
  $batstyle = $_POST["batstyle"];
  $bowlstyle = $_POST["bowlstyle"];
  $debutdate = $_POST["debutdate"];
  $debutoppteam = $_POST["debutoppteam"];
  $year = $_POST["year"];

}



$sql = "INSERT INTO playerprofile VALUES(\"$playerID\",\"$playername\",\"$team\",\"$dob\",\"$role\",\"$batstyle\",\"$bowlstyle\",\"$debutdate\",\"$debutoppteam\",\"$year\")";

$sql1 = "INSERT INTO batstat VALUES(\"$playerID\",0,0,0,0,0,0,0,0,0)";

$sql2 = "INSERT INTO bowlstat VALUES(\"$playerID\",0,0,0,0,0,0,0)";

/*$sql = "INSERT INTO teaminfo VALUES ('$_POST[\"teamID\"]','$_POST[\"dept\"]','$_POST["deptFullName"]','$_POST["logo"]','$_POST["teamColor"]')";*/

if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql1) === TRUE) {
    echo "New player has been added successfully"; ?>
  <h3> <?php echo "To add more player click on Add Player";?></h3>
    <br>
    <a href="profile1.php"><button>Add Player</button></a>
<?php
} else {
	
    //echo "Error: " . $sql . "<br>" . $conn->error; ?>
    <h2> <?php echo "Something went wrong. Either you entered an incorrect or an incomplete data.";?></h2>
    <br>
    <h1> <?php echo "Please Enter all the fields correctly.";?></h1>
    <br>
    <a href="profile1.php"><button>Retry</button></a>
    <?php
}

$conn->close();
?>
</body>
</html>
