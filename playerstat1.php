
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<!--link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"-->
<style>
* {
  box-sizing: border-box;
}
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 16px;
}

th:first-child, td:first-child {
  text-align: left;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}

</style>
</head>

<body style="padding-top:20px;">
  
    
<?php
$q = $_GET["id"];
$con = mysqli_connect('localhost','root','','cricket');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$sql1="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team1 WHERE matchID = '".$q."'";
$sql2="SELECT * FROM scheduled INNER JOIN teaminfo ON teamID=team2 WHERE matchID = '".$q."'";

$sql3="SELECT * FROM matchinfo WHERE matchID = '".$q."'";



$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);
$result3 = mysqli_query($con,$sql3);

while($row = mysqli_fetch_array($result1)) {
    $val1=$row["teamID"];$name1=$row["dept"];$color1=$row["deptColor"];$name3=$row["deptFullName"];
  }
  while($row = mysqli_fetch_array($result2)) {
    $val2=$row["teamID"];$name2=$row["dept"];$color2=$row["deptColor"];$name4=$row["deptFullName"];
  }

  $sql4="SELECT * FROM playerprofile WHERE team = '".$val1."'";
$sql5="SELECT * FROM playerprofile WHERE team = '".$val2."'";
$result4 = mysqli_query($con,$sql4);
$result5 = mysqli_query($con,$sql5);


?>

<?php 
echo "<div style=\"text-align:center;\">";
echo "<h1><b>TEAM LIST</b></h1>";
echo "<b>MatchID : ".$q."</b></span><input type=\"hidden\" name=\"matchid\" value=\"".$q."\"><br><br>";
while($row = mysqli_fetch_array($result3)) {
        echo "<b style=\"font-size:28px;\"><i>".$name1." Playing E11EVEN : </i></b><b style=\"font-size:22px;\">".$row["team1playing11"]."</b><br><br>";
        echo "<b style=\"font-size:28px;\"><i>".$name2." Playing E11EVEN : </i></b><b style=\"font-size:22px;\">".$row["team2playing11"]."</b><br><br>";
      }

  ?>

  <h2>Click on the button adjacent to the player name to update the statistics of that player.(Refer player code from above playing 11)</h2><br>

<div class="row">
  <div class="column" style="background-color:<?php echo $color1;?>">
    <h2 style="color:<?php echo $color2;?>;"><?php echo $name3;?></h2>
    
    <p><table>
      <tr>
        <th style="width:50%">Player's Name & ID</th>
        <th>Click Here</th>
      </tr>
      <?php
  while($row = mysqli_fetch_array($result4)) {
    $a=$row["name"];$b=$row["playerID"];
    echo "<tr>
    <td>".$a."(".$b.")</td>
    <td>";
    echo "<a href=\"playerstat2.php?playid=".$b."&id=".$q."\"><button style=\"padding: 8px 12px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:18px;background-color: #000;color: white\">Update</button></a>";

    echo "</td></tr>";
  }
?>

  </table></p>
      </div>

  <div class="column" style="background-color:<?php echo $color2;?>">
    <h2 style="color:<?php echo $color1;?>;"><?php echo $name4;?></h2>
    
    <p><table>
  <tr>
    <th style="width:50%">Player's Name & ID</th>
    <th>Click Here</th>
  </tr>
  <?php
  while($row = mysqli_fetch_array($result5)) {
    $c=$row["name"];$d=$row["playerID"];
    echo "<tr>
    <td>".$c."(".$d.")</td>
    <td>";
    echo "<a href=\"playerstat2.php?playid=".$d."&id=".$q."\"><button style=\"padding: 8px 12px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:18px;background-color: #000;color: white\">Update</button></a>";

    echo "</td></tr>";
  }
?>

  
  
</table></p>

  </div>
</div>
<br><br>
<?php echo "<a href=\"scoreboard1.php?id=".$q."\"><button style=\"padding: 15px 32px;margin: 4px 2px;cursor: pointer;text-align: center;font-size:24px;background-color: #0e1163;color: white\"><i>Back to Scoreboard</i></button></a>";?>

   </div>
</body>
</html>



        


