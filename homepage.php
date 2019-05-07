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

  <style>
  
	h1.a {
    font-family: "Old English Text MT", Times, serif;
	}

	
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
	
	
	
	.example3 {
 height: 200px;	
 overflow: hidden;
 position: relative;
}
.example3 h3 {
 position: absolute;
 width: 100%;
 height: 100%;
 margin: 0;
 line-height: 20px;
 text-align: center;
 /* Starting position */
 -moz-transform:translateY(-100%);
 -webkit-transform:translateY(-100%);	
 transform:translateY(-100%);
 /* Apply animation to this element */	
 -moz-animation: example3 15s linear infinite;
 -webkit-animation: example3 15s linear infinite;
 animation: example3 15s linear infinite;
}
/* Move it (define the animation) */
@-moz-keyframes example3 {
 0%   { -moz-transform: translateY(-100%); }
 100% { -moz-transform: translateY(100%); }
}
@-webkit-keyframes example3 {
 0%   { -webkit-transform: translateY(-100%); }
 100% { -webkit-transform: translateY(100%); }
}
@keyframes example3 {
 0%   { 
 -moz-transform: translateY(-100%); /* Firefox bug fix */
 -webkit-transform: translateY(-100%); /* Firefox bug fix */
 transform: translateY(-100%); 		
 }
 100% { 
 -moz-transform: translateY(100%); /* Firefox bug fix */
 -webkit-transform: translateY(100%); /* Firefox bug fix */
 transform: translateY(100%); 
 }
}
.example3 h3:hover {
 -moz-animation-play-state: paused;
 -webkit-animation-play-state: paused;
 animation-play-state: paused;
 }
	
	
	
	
	
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 20%; /* Full width */
    height: 60%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
	
	

	
	
  </style>





 <title>Thomasites</title>
   
   <nav class="navbar navbar-dark" style="background: linear-gradient(to bottom, rgb(110,53,16),black)">
	<h1 class="a"style="color:white">St. Thomas' College of Engineering & Technology</h1>
	<h5 class="text-white" style="text-align:right;padding-top: 0px;padding-right: 0px;"><i>Kolkata, West Bengal</i></h>
	<p span style="font-family:Broadway, Times, serif; color: white">Thomasites Sports Academy</span></p>
	</nav>
   <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to bottom,black,black)">
  <!-- Brand -->
  <!--<a class="navbar-brand" href="#"><h1> Thomasites Sports Academy </h1></a>-->
  <!-- Links -->
 

 
 
 <img id="myImg" src="logo.png" alt="Snow" style="width:50%;max-width:65px">

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">
</div>

  <a class="navbar-brand" style="font-family:Forte, Times, serif; color:white" href="#"><i>S.T.C.E.T</i></a>
  
  
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	</ul>
	
	
    <form class="form-inline my-2 my-lg-0">
      <a href="\cric\adminschedule.php" button class="btn my-2 my-sm-0" style="color:white;background-color:rgb(74,33,12);" data-toggle="tooltip" data-placement="top"><i class="fa fa-sign-in w3-xlarge"></i> Scorer Login</button></a>
    </form>
    <p> &emsp;&emsp;</p>
    <form class="form-inline my-2 my-lg-0">
      <a href="adminLogin.php" button class="btn my-2 my-sm-0" style="color:white;background-color:rgb(74,33,12);" data-toggle="tooltip" data-placement="top"><i class="fa fa-sign-in w3-xlarge"></i> Admin Login</button></a>
    </form>
  
</nav>

</head>
<body>



  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav" style="background: linear-gradient(to bottom,black,black,black, rgb(110,53,16))">
		
	
	
    </div>
	
    <div class="col-sm-8 text-justify text-white" style="background:url(wallpaper5.jpg);background-repeat:no-repeat;background-size:100% 100%;"> 
      <h1>Welcome</h1>
      <p><h5>“Sport has the power to change the world.It has the power to inspire, it has the power to unite people in a way that little else does. It speaks to youth in a language they understand. Sport can create hope, where once there was only despair. It is more powerful than governments in breaking down racial barriers. It laughs in the face of all types of discrimination.”</h5>
	  <h3 class="text-right text-white"><b><i> – Nelson Mandela </i></b></h3></p>
      <hr>
	  <marquee class="text-white" hspace="180" vspace="10" scrolldelay="70" scrollamount="10" truespeed behavior="alternate"><font size="10"><b>WINNERS NEVER QUIT AND QUITTERS NEVER WIN</b></font></marquee>
      <!--h1><b>ALL DAY I DREAM ABOUT SPORTS</b></h1-->
    </div>
    <div class="col-sm-2 sidenav" style="background: linear-gradient(to bottom,black,black,black, rgb(110,53,16))">
     </div>
  </div>
</div>

<footer class="container-fluid" style="background: linear-gradient(to bottom,rgb(110,53,16),black,black)">
  <h2 style="font-family:Broadway, Times, serif; color: white;text-align: center;padding: 40px 0px 0px 0px;">Thomasites Sports Academy</h2>
  <p style="text-align: center;color: grey;">STCET INTRA COLLEGE SPORTS TOURNAMENT</p>
  <p style="text-align: center;color: white;padding: 20px 0px 60px 0px;">St. Thomas' College of Engineering & Technology
  <br>4, Diamond Harbour Road, Kidderpore
  <br>Kolkata- 700023</p>
  <hr></hr>
  <table style="width:100%;font-family: arial, sans-serif;border-collapse: collapse;text-align: center;">
  <tr>
    <th style="padding: 0px 0px 30px 0px;font-size: 30px;">College Info</th>
    <th style="padding: 0px 0px 20px 150px;font-size: 30px;">Department</th>
    <th style="padding: 0px 0px 20px 150px;font-size: 30px;">Sports</th>
	<th style="padding: 0px 0px 20px 150px;font-size: 30px;">Other Links</th>
  </tr>
  <tr>
    <td style="padding: 0px 0px 3px 0px;font-size: 16px;"><a href="#">About Us</a></td>
    <td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Electrical</a></td>
    <td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Badminton</a></td>
	<td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">FAQ</a></td>
  </tr>
  <tr>
    <td style="padding: 0px 0px 3px 0px;font-size: 16px;"><a href="#">Privacy Policy</a></td>
    <td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Electronics & Communication</a></td>
    <td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Cricket</a></td>
	<td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Feedback</a></td>
  </tr>
  <tr>
    <td style="padding: 0px 0px 3px 0px;font-size: 16px;"><a href="#">Contact Us</a></td>
    <td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Computer Science</a></td>
    <td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Football</a></td>
	<td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Photo Gallery</a></td>
  </tr>
  <tr>
    <td style="padding: 0px 0px 3px 0px;font-size: 16px;"><a href="#">Facilities</a></td>
    <td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Information Technology</a></td>
    <td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">Table Tennis</a></td>
	<td style="padding: 0px 0px 0px 150px;font-size: 16px;"><a href="#">What's New</a></td>
  </tr>
</table>
</footer>


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

</body>
</html>