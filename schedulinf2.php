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

$category = $matchNo = $matchday = $matchtime = $team1 = $team2 = $matchtype = $matchID = $uname = $pass ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category = $_POST["category"];
  $matchNo = $_POST["matchNo"];
  $matchday = $_POST["matchday"];
  $matchtime = $_POST["matchtime"];
  $team1 = $_POST["team1"];
  $team2 = $_POST["team2"];
  $matchtype = $_POST["matchtype"];
  $matchID = $_POST["matchID"];
  $uname = $_POST["uname"];
  $pass = $_POST["pass"];

}



$sql = "INSERT INTO scheduled VALUES(\"$category\",\"$matchNo\",\"$matchtime\",\"$matchday\",\"$team1\",\"$team2\",\"$matchtype\",\"$matchID\",\"$uname\",\"$pass\")";

/*$sql = "INSERT INTO teaminfo VALUES ('$_POST[\"teamID\"]','$_POST[\"dept\"]','$_POST["deptFullName"]','$_POST["logo"]','$_POST["teamColor"]')";*/

if ($conn->query($sql) === TRUE) {
    echo "New match has been added successfully"; ?>
  <h3> <?php echo "To add more match click on Add Match";?></h3>
    <br>
    <a href="schedulinf1.php"><button>Add Match</button></a>
<?php
} else {
	
    //echo "Error: " . $sql . "<br>" . $conn->error; ?>
    <h2> <?php echo "Something went wrong. Either you entered an incorrect or an incomplete data.";?></h2>
    <br>
    <h1> <?php echo "Please Enter all the fields correctly.";?></h1>
    <br>
    <a href="schedulinf1.php"><button>Retry</button></a>
    <?php
}

$conn->close();
?>
</body>
</html>
