<?php
		error_reporting(E_ERROR | E_PARSE);

			$q=$val1=$val2=$sname=$nsname=$bname="";
			$q = $_GET["id"];
			$cruns=$bruns=$sruns=$nsruns=$bballs=$sballs=$nsballs=$wickets1=$wickets2=0;
			$t=$cball=$striker=$nonstriker=$bowler="";

			$con = mysqli_connect('localhost','root','','cricket');
			if (!$con) {
    			die('Could not connect: ' . mysqli_error($con));
			}


			$sql1="SELECT * FROM scorecard WHERE match_id = '".$q."' and balls_delivered = (SELECT max(balls_delivered) FROM scorecard WHERE match_id = '".$q."')";
			
			$result1 = mysqli_query($con,$sql1);
			while($row = mysqli_fetch_array($result1)) {
				$cball=$row["ball_type"];$cruns=$row["runs"];$striker=$row["striker"];$nonstriker=$row["non-striker"];$bowler=$row["bowler"];
				if($cball=="Normal")
				{
					if($cruns%2==1)
					{
					$t=$striker;$striker=$nonstriker;$nonstriker=$t;}
				}
				else
				{
					if($cruns%2==0)
					{
					$t=$striker;$striker=$nonstriker;$nonstriker=$t;}
				
				}

        }
        $sql20="SELECT * FROM playerprofile WHERE playerID = '".$striker."'";
      $result20 = mysqli_query($con,$sql20);
      while($row = mysqli_fetch_array($result20)) {
        $sname=$row["name"];
    }
    $sql21="SELECT * FROM playerprofile WHERE playerID = '".$nonstriker."'";
      $result21 = mysqli_query($con,$sql21);
      while($row = mysqli_fetch_array($result21)) {
        $nsname=$row["name"];
    }
    $sql22="SELECT * FROM playerprofile WHERE playerID = '".$bowler."'";
      $result22 = mysqli_query($con,$sql22);
      while($row = mysqli_fetch_array($result22)) {
        $bname=$row["name"];
    }

    		$sql4="SELECT sum(no_of_balls) as balls,sum(runs) as runs,sum(wicket) as wickets FROM scorecard WHERE match_id = '".$q."' AND bowler = '".$bowler."'";
    		$sql5="SELECT sum(runs) as runs FROM scorecard WHERE ball_struck = 'Bat' AND match_id = '".$q."' AND striker = '".$striker."'";
    		$sql6="SELECT count(*) as fours FROM scorecard WHERE ball_struck = 'Bat' AND runs = 4 AND match_id = '".$q."' AND striker = '".$striker."'";
    		$sql7="SELECT count(*) as sixes FROM scorecard WHERE ball_struck = 'Bat' AND runs = 6 AND match_id = '".$q."' AND striker = '".$striker."'";
    		$sql11="SELECT count(*) as extra FROM scorecard WHERE ball_struck = 'Bat' AND ball_type = 'No Ball' AND match_id = '".$q."' AND striker = '".$striker."'";
    		$sql13="SELECT count(*) as balls FROM scorecard WHERE ball_type <> 'Wide' AND match_id = '".$q."' AND striker = '".$striker."'";
    		$sql8="SELECT sum(runs) as runs FROM scorecard WHERE ball_struck = 'Bat' AND match_id = '".$q."' AND striker = '".$nonstriker."'";
    		$sql9="SELECT count(*) as fours FROM scorecard WHERE ball_struck = 'Bat' AND runs = 4 AND match_id = '".$q."' AND striker = '".$nonstriker."'";
    		$sql10="SELECT count(*) as sixes FROM scorecard WHERE ball_struck = 'Bat' AND runs = 6 AND match_id = '".$q."' AND striker = '".$nonstriker."'";
    		$sql12="SELECT count(*) as extra FROM scorecard WHERE ball_struck = 'Bat' AND ball_type = 'No Ball' AND match_id = '".$q."' AND striker = '".$nonstriker."'";
    		$sql14="SELECT count(*) as balls FROM scorecard WHERE ball_type <> 'Wide' AND match_id = '".$q."' AND striker = '".$nonstriker."'";
    		$result4 = mysqli_query($con,$sql4);
			$result5 = mysqli_query($con,$sql5);
			$result6 = mysqli_query($con,$sql6);
			$result7 = mysqli_query($con,$sql7);
			$result8 = mysqli_query($con,$sql8);
			$result9 = mysqli_query($con,$sql9);
			$result10 = mysqli_query($con,$sql10);
			$result11 = mysqli_query($con,$sql11);
			$result12 = mysqli_query($con,$sql12);
			$result13 = mysqli_query($con,$sql13);
			$result14 = mysqli_query($con,$sql14);
			while($row = mysqli_fetch_array($result4)) {
        $bballs=$row["balls"];$bruns=$row["runs"];$bwickets=$row["wickets"];
    }
    while($row = mysqli_fetch_array($result5)) {
        $sruns=$row["runs"];
    }
    while($row = mysqli_fetch_array($result8)) {
        $nsruns=$row["runs"];
    }
    while($row = mysqli_fetch_array($result6)) {
        $sfour=$row["fours"];
    }
    while($row = mysqli_fetch_array($result7)) {
        $ssix=$row["sixes"];
    }
    while($row = mysqli_fetch_array($result9)) {
        $nsfour=$row["fours"];
    }
    while($row = mysqli_fetch_array($result10)) {
        $nssix=$row["sixes"];
    }
    while($row = mysqli_fetch_array($result11)) {
        $sextra=$row["extra"];
    }
    while($row = mysqli_fetch_array($result12)) {
        $nsextra=$row["extra"];
    }
    while($row = mysqli_fetch_array($result13)) {
        $sballs=$row["balls"];
    }
    while($row = mysqli_fetch_array($result14)) {
        $nsballs=$row["balls"];
    }
    $sruns-=$sextra;$nsruns-=$nsextra;
?>


<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script>
	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
	});
  </script>
  
  
<head>
	<meta http-equiv="Refresh" content="12">
 <style>
	
  .carousel-inner img {
      width: 90%;
      height: 400px;
  }
  .card {
		width: 73%;
		height:750px;
		align: center;
		}
 </style>
 
 
<nav class="navbar navbar-dark" style="background-color: black;">
	<h2 class="text-white" style="font-family: 'Old English Text MT', Times, serif;">St. Thomas' College of Engineering & Technology</h2>
	<p span style="color: white;">Intra college cricket tournament</span></p>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">CRICBASH</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	  <li class="nav-item dropdown">
		<div class="btn-group">
		<a href="cric1.php?id=<?php echo $q; ?>" class="btn" style="background-color: #770909;color: white;" role="button"><i class="fa fa-home w3-xlarge"></i> HOME</a>
		</div>&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="btn-group">
			<a href="info.php?id=<?php echo $q; ?>" class="btn" style="background-color: #770909;color: white;" role="button"><i class="fa fa-calendar w3-xlarge"></i> INFO</a>
		</div>&nbsp;&nbsp;&nbsp;&nbsp;
		<div class="btn-group">
			<a href="live.php?id=<?php echo $q; ?>" class="btn" style="background-color: #770909;color: white;" role="button"><i class="fa fa-calendar-check-o w3-xlarge"></i> LIVE</a>
		</div>
      </li>
	</ul>
	
  </div>
</nav>
</head>


<body style="background:url(scorewall.jpg);background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed">
<hr>
<?php if($sname!="")
		{
			
		
		?>
<table style="width:100%;color: white;margin-left: 60px;font-size: 24px">
  <tr>
    <th style="width:40%">Batman</th>
    <th style="width:12%">Runs</th> 
    <th style="width:12%">Balls</th>
    <th style="width:12%">4s</th> 
    <th style="width:12%">6s</th>
    <th style="width:12%">SR</th> 
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $sname; ?>*</td>
    <td><?php echo $sruns; ?></td>
    <td><?php echo $sballs; ?></td>
    <td><?php echo $sfour; ?></td>
    <td><?php echo $ssix; ?></td>
    <td><?php echo number_format(($sruns*100/$sballs), 2, '.', ''); ?></td>
  </tr>
  <tr>
    <td><?php echo $nsname; ?></td>
    <td><?php echo $nsruns; ?></td>
    <td><?php echo $nsballs; ?></td>
    <td><?php echo $nsfour; ?></td>
    <td><?php echo $nssix; ?></td>
    <td><?php echo number_format(($nsruns*100/$nsballs), 2, '.', ''); ?></td>
  </tr>
</table>
<hr style="margin-left:50px;margin-right:50px;">
<table style="width:100%;color: white;margin-left: 60px;font-size: 24px">
  <tr>
    <th style="width:40%">Bowler</th>
    <th style="width:12%">Overs</th> 
    <th style="width:12%">Maiden</th>
    <th style="width:12%">Runs</th> 
    <th style="width:12%">Wickets</th>
    <th style="width:12%">ER</th> 
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $bname; ?></td>
    <td><?php echo (int)($bballs/6).".".($bballs%6); ?></td>
    <td>0</td>
    <td><?php echo $bruns; ?></td>
    <td><?php echo $bwickets; ?></td>
    <td><?php echo (int)($bruns*6/$bballs); ?></td>
  </tr>
</table>
<hr>
<?php 
	}
	else
	{
		echo "<h1 style=\"color:white;text-align:center;margin-top:200px;\">Innings not yet started.</h1>";
	}
	mysqli_close($con);
?>
</body>
</html>