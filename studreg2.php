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

 $year = $name = $dept = $sports = $roll = $ID =$phone = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ID = $_POST["ID"];
  $name = $_POST["name"];
  $dept = $_POST["dept"];
  $sports = $_POST["sports"];
  $roll = $_POST["roll"];
  $year = $_POST["year"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
}



$sql = "INSERT INTO studreg VALUES(\"$ID\",\"$sports\",\"$dept\",\"$name\",\"$roll\",\"$year\",\"$phone\",\"$email\")";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Your request has been registered successfully</h1>"; ?>
  <h3> <?php echo "Back TO HomePage";?></h3>
    <br>
    <a href="homepage1.html"><button>Home Page</button></a>
<?php
} else {
	
    //echo "Error: " . $sql . "<br>" . $conn->error; ?>
    <h2> <?php echo "Something went wrong. Either you entered an incorrect or an incomplete data.";?></h2>
    <br>
    <h1> <?php echo "Please Enter all the fields correctly.";?></h1>
    <br>
    <a href="studreg1.php"><button>Retry</button></a>
    <?php
}

$conn->close();
?>
</body>
</html>
