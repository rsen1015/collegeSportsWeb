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

$teamID = $dept = $deptFullName = $logo = $deptColor = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $teamID = $_POST["teamID"];
  $dept = $_POST["dept"];
  $deptFullName = $_POST["deptFullName"];
  $logo = $_POST["logo"];
  $deptColor = $_POST["deptColor"];

}



$sql = "INSERT INTO teaminfo VALUES (\"$teamID\",\"$dept\",\"$deptFullName\",\"$logo\",\"$deptColor\")";

/*$sql = "INSERT INTO teaminfo VALUES ('$_POST[\"teamID\"]','$_POST[\"dept\"]','$_POST["deptFullName"]','$_POST["logo"]','$_POST["teamColor"]')";*/

if ($conn->query($sql) === TRUE) {
    echo "New team has been added successfully"; ?>
  <h3> <?php echo "To add more teams click on Add Team";?></h3>
    <br>
    <a href="teaminfo.php"><button>Add Team</button></a>
<?php
} else {
	
    //echo "Error: " . $sql . "<br>" . $conn->error; ?>
    <h2> <?php echo "Something went wrong. Either you entered an incorrect or an incomplete data.";?></h2>
    <br>
    <h1> <?php echo "Please Enter all the fields correctly.";?></h1>
    <br>
    <a href="teaminfo.php"><button>Retry</button></a>
    <?php
}

$conn->close();
?>
</body>
</html>
