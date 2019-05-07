<html>
<head>

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


<script>
 function checkEntry(){
	var a = document.forms["schedule"]["category"].value;
	var b = document.forms["schedule"]["matchNo"].value;
	var c = document.forms["schedule"]["matchday"].value;
	var d = document.forms["schedule"]["matchtime"].value;
	var e = document.forms["schedule"]["team1"].value;
    var f = document.forms["schedule"]["team2"].value;
    var g = document.forms["schedule"]["matchtype"].value;
    var h = document.forms["schedule"]["matchID"].value;
    if(a == "" || b ==""  ||  c == "" || d == "" || e == "" || f == "" || g == "" || h == ""){
        alert('Given data is incomplete. Please try again!!');
        return false;
    }
    if(e==f){
        alert('Both team1 and team2 cannot be same. Please enter two different teams !!');
        return false;
    }
    var firstDate = new Date( dueDate = c );
    today = new Date(); 

    if( today > firstDate ){
     alert("Please give a valid match date !!");
            return false;
    }
    return true;
}
</script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="w3-sidebar w3-bar-block w3-black" style="width:25%">
  <a href="adminPortal1.php" class="w3-bar-item w3-button w3-hover-red w3-xlarge"><i class="fa fa-home"></i> Home</a>
  <hr><a href="teaminfo.php" class="w3-bar-item w3-button w3-xlarge">Add Teams</a>
  <a href="profile1.php" class="w3-bar-item w3-button w3-hover-yellow w3-xlarge">Add Players</a>
  <a href="schedulinf1.php" class="w3-bar-item w3-button w3-hover-green w3-xlarge">Add Matches</a><hr>
  
</div>

    <div style="width:100%;height:100%;position:absolute;vertical-align:middle;text-align:center;">
    <h1>Manage Schedule</h1>

    <form name="schedule" action="/cric/schedulinf2.php"  onsubmit="return checkEntry()" method="post">
    Category: 
    <select name="category">
    <option value="">Select a category:</option>
    <option value="Girls">Girls</option>
    <option value="Boys ">Boys</option>
    </select>
<br>

    Match Number: <input type="number" name="matchNo"><br>

    Match Date: <input type="date" name="matchday"><br>

    Select match time: <input type="time" name="matchtime"><br>

    
    <?php
    echo "Team 1:<select name=\"team1\"><option value=\"\">Select a team:</option>";
    if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
       echo "<option value=\"" . $row["teamID"] . "\">".$row["dept"]."</option>";
        /*echo "Subject1: " . $row["sub1"]."<br>";
        echo "Subject2: " . $row["sub2"]."<br>";
        echo "Total: " . $row["total"]."<br>";*/
    }
    } 
    echo "</select><br>";

    echo "Team 2:<select name=\"team2\"><option value=\"\">Select a team:</option>";
    if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
       echo "<option value=\"" . $row["teamID"] . "\">".$row["dept"]."</option>";
    }
    } 
    echo "</select><br>";

    $conn->close();
    ?>

    Match Type:
    <select name="matchtype">
    <option value="">Select a type:</option>
    <option value="League">League</option>
    <option value="Semi-Final">Semi-Final</option>
    <option value="Quater-Final">Quater-Final</option>
    <option value="Final">Final</option>
    </select><br>

    Match ID: <input type="text" name="matchID"><br>
    User Name: <input type="text" name="uname"><br>
    Password: <input type="text" name="pass"><br><br>
    
    <input type="submit" name="submit" value="Add Match" style="text-align: center;font-size:18px;" class="btn btn-info">
    </div>
    </form> 
    <script> 
</script>
 </body>
 </html>


 


