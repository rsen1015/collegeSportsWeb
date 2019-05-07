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



$matchid = $status = $matchwon = $matchlost = $runs = $wickets = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $matchid = $_POST["matchid"];
  $status = $_POST["status"];
  $matchwon = $_POST["matchwon"];
  $matchlost = $_POST["matchlost"];
  $runs = $_POST["runs"];
  $wickets = $_POST["wickets"];

}


$sql = "INSERT INTO matchstatus VALUES(\"$matchid\",\"$status\",\"$matchwon\",\"$runs\",\"$wickets\",\"$matchlost\")";


if ($conn->query($sql) === TRUE) {
    echo "Match Summary has been recorded successfully"; ?>
  <h3> <?php echo "Click on Back to Scoreboard";?></h3>
    <br>
    <a href="/cric/scoreboard1.php?id=<?php echo $matchid;?>"><button>Back to Scoreboard</button></a>
<?php
} else {
	
    //echo "Error: " . $sql . "<br>" . $conn->error; ?>
    <h2> <?php echo "Something went wrong. Either you entered an incorrect or an incomplete data.";?></h2>
    <br>
    <h1> <?php echo "Please Enter all the fields correctly.";?></h1>
    <br>
    <?php echo "<a href=\"scoreboard1.php?id=".$matchid."\"><button style=\"padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white\"><i>Back to Scoreboard</i></button></a>";?>

    <br><br><?php echo "<a href=\"matchstatus1.php?id=".$matchid."\"><button>Retry</button></a>";

    
}

$conn->close();
?>
</body>
</html>
