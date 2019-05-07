<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uvcan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $runs = $wick = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $runs = $_POST["runs"];
  $wick = $_POST["wick"];

}

echo $id;
echo $runs;
echo $wick;

$sql = "INSERT INTO sc1 VALUES($id,$runs,$wick)";

/*$sql = "INSERT INTO teaminfo VALUES ('$_POST[\"teamID\"]','$_POST[\"dept\"]','$_POST["deptFullName"]','$_POST["logo"]','$_POST["teamColor"]')";*/

if ($conn->query($sql) === TRUE) {
    echo "New player has been added successfully"; ?>
  <h3> <?php echo "To add more player click on Add Player";?></h3>
    <br>
    <a href="tempscore1.php"><button>Add Player</button></a>
<?php
} else {
	
    //echo "Error: " . $sql . "<br>" . $conn->error; ?>
    <h2> <?php echo "Something went wrong. Either you entered an incorrect or an incomplete data.";?></h2>
    <br>
    <h1> <?php echo "Please Enter all the fields correctly.";?></h1>
    <br>
    <a href="tempscore1.php"><button>Retry</button></a>
    <?php
}

$conn->close();
?>
</body>
</html>
