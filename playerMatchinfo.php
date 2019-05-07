<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli('localhost','root','','cricket');

$result = $conn->query("SELECT * FROM playerprofile");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{playerID:"'  . $rs["playerID"] . '",';
   $outp .= 'team:"'   . $rs["team"]        . '",';
  $outp .= 'name:"'. $rs["name"]     . '"}';
}
$outp ='['.$outp.']';
$conn->close();

echo($outp);
?>