<html>
<head>
  <script>
         function over() {
            alert(" It's an OVER! Click on Change Bowler or Batsman. ");
         }
         function innings() {
            alert(" Innings OVER! Click on Innings Change. ");
         }
         function dismiss() {
            alert(" And it's OUT! New Batsman arrives, click on Change Bowler or Batsman. ");
         }
      </script>
   </head>
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


$noofball = $wickets = 1;
$runs =$balls =$ballsdeli = 0;
$matchid = $batid = $stricker = $nonstriker = $bowler =  $bowltype  = $ballplayed = $wickettype = $fielder = $batdismiss =$t= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $matchid = $_POST["matchid"];
  $batid = $_POST["batid"];
  $bowlid = $_POST["bowlid"];
  $bowler = $_POST["bowler"];
  $striker = $_POST["striker"];
  $nonstriker = $_POST["nonstriker"];
  $runs = $_POST["runs"];
  $bowltype = $_POST["bowltype"];
  $ballplayed = $_POST["ballplayed"];
  $wickettype = $_POST["wickettype"];
  $fielder = $_POST["fielder"];
  $batdismiss = $_POST["batdismiss"];
  $balls = $_POST["balls"];
  $ballsdeli = $_POST["ballsdeli"];
  
}
error_reporting(E_ALL ^ E_WARNING); 
if(($balls+1)%6==0){
     echo '<script type="text/javascript">over();</script>';
   }

   if(($balls+1)==120){
     echo '<script type="text/javascript">innings();</script>';
   }
   if($batdismiss!="None"){
     echo '<script type="text/javascript">dismiss();</script>';
   }
$ballsdeli=$ballsdeli+1;
if($bowltype != "Normal")
{
  $noofball=0;
  $runs = $runs + 1;
}
if($wickettype == "None")
{
  $wickets=0;
}
$sql = "INSERT INTO scorecard VALUES(\"$matchid\",\"$batid\",$ballsdeli,$noofball,\"$bowltype\",$runs,\"$ballplayed\",\"$striker\",\"$nonstriker\",$wickets,\"$wickettype\",\"$bowler\",\"$fielder\",\"$batdismiss\",CURRENT_TIMESTAMP)";


if($bowltype != "Normal")
{
  if($runs == 2 || $runs == 4 || $runs == 6)
{
  $t=$striker;
  $striker=$nonstriker;
  $nonstriker=$t;
}
}
else{if($runs == 1 || $runs == 3 || $runs == 5)
{
  $t=$striker;
  $striker=$nonstriker;
  $nonstriker=$t;
}}


if ($conn->query($sql) === TRUE) {
    echo "New Record has been edited successfully"; ?>
  <h1> <?php echo "Next Ball ";?></h1>
    <form name="score" action="/cric/scoreboard3.php" method="post">
<?php 
echo "<input type=\"hidden\" name=\"matchid\" value=\"".$matchid."\">";
  echo "<input type=\"hidden\" name=\"batid\" value=\"".$batid."\">";
  echo "<input type=\"hidden\" name=\"bowlid\" value=\"".$bowlid."\">";
 echo "<input type=\"hidden\" name=\"bowler\" value=\"".$bowler."\">";
  echo "<input type=\"hidden\" name=\"striker\" value=\"".$striker."\">";
  echo "<input type=\"hidden\" name=\"nonstriker\" value=\"".$nonstriker."\">";
 ?>
    <button type="submit" name="submit" style="padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white"><i>Continue</i></button></form><br>
    <h1>Click here to change bowler or batsman (OVER or DISMISAL)</h1>
    <?php echo "<a href=\"scoreboard2.php?id=".$matchid."&teamID=".$batid."\"><button style=\"padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white\"><i>Change Bowler or Batsman</i></button></a>";?><br>
    <h1>Innings Change</h1>
    <?php echo "<a href=\"scoreboard1.php?id=".$matchid."\"><button style=\"padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white\"><i>Innings Change</i></button></a>";?>
<?php
} else {
	
    //echo "Error: " . $sql . "<br>" . $conn->error; ?>
    <h2> <?php echo "Something went wrong. Either you entered an incorrect or an incomplete data.";?></h2>
    <br>
    <h1> <?php echo "Please Enter all the fields correctly.";?></h1>
    <br>
    <?php //echo "<a href=\"matchotrap.php?id=".$matchid."\"><button>Retry</button></a>";
    
}

$conn->close();
?>
</body>
</html>
