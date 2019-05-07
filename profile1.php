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

$sql = "SELECT teamID,dept FROM teaminfo";
$result1 = $conn->query($sql);
$result2 = $conn->query($sql);
?>


<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>

 function checkEntry(){
	var a = document.forms["profile"]["playerID"].value;
	var b = document.forms["profile"]["playername"].value;
	var c = document.forms["profile"]["team"].value;
	var d = document.forms["profile"]["dob"].value;
	var e = document.forms["profile"]["role"].value;
    var f = document.forms["profile"]["batstyle"].value;
    var g = document.forms["profile"]["bowlstyle"].value;
    var h = document.forms["profile"]["debutdate"].value;
    var i = document.forms["profile"]["year"].value;
    var j = document.forms["profile"]["debutoppteam"].value;
    if(a == "" || b ==""  ||  c == "" || d == "" || e == "" || f == "" || g == "" || h == ""){
        alert('Given data is incomplete. Please try again!!');
        return false;
    }
    return true;
}
</script>
<div class="w3-sidebar w3-bar-block w3-black" style="width:25%">
  <a href="adminPortal1.php" class="w3-bar-item w3-button w3-hover-red w3-xlarge"><i class="fa fa-home"></i> Home</a>
  <hr><a href="teaminfo.php" class="w3-bar-item w3-button w3-xlarge">Add Teams</a>
  <a href="profile1.php" class="w3-bar-item w3-button w3-hover-yellow w3-xlarge">Add Players</a>
  <a href="schedulinf1.php" class="w3-bar-item w3-button w3-hover-green w3-xlarge">Add Matches</a><hr>
  
</div>

    <div style="width:100%;height:100%;position:absolute;vertical-align:middle;text-align:center;">

<h1>Manage Player</h1>
</head>
<body>
    <form name="profile" action="/cric/profile2.php"  onsubmit="return checkEntry()" method="post">

    Player ID: <input type="text" name="playerID"><br>

    Player Name: <input type="name" name="playername"><br>
    
    <?php
    echo "Team :<select name=\"team\"><option value=\"\">Select a team:</option>";
    if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
       echo "<option value=\"" . $row["teamID"] . "\">".$row["dept"]."</option>";
    }
    } 
    echo "</select><br>";
    
    ?>
    Date of Birth: <input type="date" name="dob"><br>

    Role: <select name="role">
    <option value="">Select a role:</option>
    <option value="WK-Batsman">WK-Batsman</option>
    <option value="Batsman">Batsman</option>
    <option value="Batting AllRounder">Batting AllRounder</option>
    <option value="Bowling AllRounder">Bowling Allrounder</option>
    <option value="Bowler">Bowler</option>
    </select><br>

    Batting Style: 
    <select name="batstyle">
    <option value="">Select a style:</option>
    <option value="Right Handed Batsman">Right Handed Batsman</option>
    <option value="Left Handed Batsman">Left Handed Batsman</option>
    </select><br>

    Bowling Style: 
    <select name="bowlstyle">
    <option value="">Select a style:</option>
    <option value="Left Arm Fast">Left Arm Fast</option>
    <option value="Right Arm Fast">Right Arm Fast</option>
    <option value="Left Arm Medium Fast">Left Arm Medium Fast</option>
    <option value="Right Arm Medium Fast">Right Arm Medium Fast</option>
    <option value="Left Arm Medium">Left Arm Medium</option>
    <option value="Right Arm Medium">Right Arm Medium</option>
    <option value="Left Arm Leg Spin">Left Arm Leg Spin</option>
    <option value="Right Arm Leg Spin">Right Arm Leg Spin</option>
    <option value="Left Arm Off Spin">Left Arm Off Spin</option>
    <option value="Right Arm Off Spin">Right Arm Off Spin</option>
    </select><br>

    Debut Date: <input type="date" name="debutdate"><br>

    Year: 
    <select name="year">
    <option value="">Your Current Year:</option>
    <option value="1st">1st</option>
    <option value="2nd">2nd</option>
    <option value="3rd">3rd</option>
    <option value="4th">4th</option>
    </select><br>

    <?php
    echo "Debut Against:<select name=\"debutoppteam\"><option value=\"\">Select a team:</option>";
    if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
       echo "<option value=\"" . $row["teamID"] . "\">".$row["dept"]."</option>";
    }
    } 
    echo "</select><br>";

    $conn->close();
    ?>
    <br>
    <input type="submit" name="submit" value="Add Player" style="text-align: center;font-size:18px;" class="btn btn-info">
    </div>
    </form> 
 </body>
 </html>


 


