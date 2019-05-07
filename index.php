<html>
<head>
</head>
<body>
<?php

$user = 'root';
$pass = '';
$db = 'cricket';

$db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");

$sql = "SELECT sum(runs) as totr,sum(wicket) as totw FROM scorecard";

$result = mysqli_query($db, $sql) or die("bad query: $sql");

while($row = mysqli_fetch_assoc($result)){
	echo "{$row['totr']}"."/"."{$row['totw']}<br>";
	}
?>

</body>
</html>