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

$sql = "SELECT * FROM scheduled";
$result1 = $conn->query($sql);
?>


<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 


  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="w3-sidebar w3-bar-block w3-black" style="width:25%">
  
  <hr><a href="homepage.php" class="w3-bar-item w3-button w3-hover-red w3-xlarge"><i class="fa fa-home"></i> Home</a><hr>
  
</div>

    <div style="width:100%;height:100%;position:absolute;vertical-align:middle;text-align:center;padding-left:400px;">

	<table border="2">
	<tr>
      <th>Category</th>
      <th>Match No.</th>
      <th>Teams </th>
      <th>Date & Time </th>
      <th>Scoreboard</th>
    </tr>
    <?php
    if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
       print "<tr> <td>";echo  $row["category"];
       print "</td> <td>";echo  $row["matchNumber"];
       print "</td> <td>";echo $row["team2"]." <a class=\"btn-floating btn-large cyan pulse\" href=\"scorerLogin.php?id=".$row["matchID"]."\">";
       echo  " vs ";
       echo "</a> ".$row["team1"];
       print "</td> <td>";$date = new DateTime($row["matchDate"]);
		echo $date->format('d.m.Y')." , ".$row["matchTime"];
       print "</td> <td>";echo " <a class=\"btn-floating btn-large red pulse\" href=\"scorerLogin2.php?id=".$row["matchID"]."\">";echo  " LIVE </a> ";
       print "</td> </tr>";
    }
    } 
    
    ?>
  	</table>
  </div>
  
</body>
 </html>
