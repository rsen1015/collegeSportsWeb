<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 
 
 <meta charset="UTF-8">
<script>
 function checkRegistration(){
	var a = document.forms["team"]["teamID"].value;
	var b = document.forms["team"]["dept"].value;
	var c = document.forms["team"]["deptFullName"].value;
	var d = document.forms["team"]["logo"].value;
	var e = document.forms["team"]["deptColor"].value;
    if(a == "" || b ==""  ||  c == "" || d == "" || e == ""){
        alert('Given data is incomplete. Please try again!!');
        return false;
    }
    return true;
}
</script>
</head>
<body>
    <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="adminPortal1.php" class="brand-logo">Admin Portal</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="teaminfo.php">Add Teams</a></li>
          <li><a href="profile1.php">Add Players</a></li>
          <li><a href="schedulinf1.php">Add Match</a></li>
        </ul>
      </div>
    </nav>
  </div>

<h1>New Team Registration</h1>
    <form name="team" action="/cric/teaminfo1.php"  onsubmit="return checkRegistration()" method="post">
    Team ID: <input type="text" name="teamID"><br>
    Name: <input type="text" name="dept"><br>
    Team/Dept Full Name: <input type="text" name="deptFullName"><br>
    Team Logo: <input type="text" name="logo"><br>
    Team Color: <input type="color" name="deptColor" value="#ff0000"><br><br>

    <div style="width:100%;height:100%;position:absolute;vertical-align:middle;text-align:center;">
    <input type="submit" name="submit" value="Add Team" style="text-align: center;font-size:18px;" class="btn btn-info">
    </div>
    </form> 
 </body>
 </html>


 


