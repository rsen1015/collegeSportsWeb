<?php

$q = $uname = $psw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $q = $_POST["id"];
  $uname = $_POST["uname"];
  $psw = $_POST["psw"];
}


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
$teamID=$dept=$deptFullName=$deptColor="";
$sql = "SELECT * FROM scheduled where matchID='".$q."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	$uname1=$row["uname"];
	$pass=$row["pass"];
}

if($uname == $uname1 && $psw == $pass)
{
  header('Location: scoreboard1.php?id='.$q);
}
else
{
	echo "Please try again <br><br>";
	echo "<a href=\"scorerLogin2.php?id=".$q."\"><button>Try Again</button></a>";
}


?>