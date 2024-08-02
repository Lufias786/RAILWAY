<?php 
//Databse Connection file
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
	}
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
// ------------------------------------------------------------------------
if(isset($_POST['ok']))
  {
  	//getting the post values
	
    $fname=$_POST['fname'];
    $emil=$_POST['email'];
    $contno=$_POST['contactno'];
	$ppic=$_FILES["profilepic"]["name"];
    $status="waiting";
	$trains=$_POST['trains'];
// -------------------for uploding train no to passanger table--------------------------
    $sql = "SELECT t_no FROM trains WHERE t_name = '$trains'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $email=$_SESSION['user_info'];
    $query="UPDATE passengers SET t_no='$row[t_no]' WHERE email='$email';";

// get the image extension
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["profilepic"]["tmp_name"],"img/".$imgnewfile);
// Query for data insertion
$query=mysqli_query($conn, "insert into tickets(name,email,phno, ProfilePic,status,t_name) value('$fname','$email', '$contno', '$imgnewfile', '$status','$trains' )");
if ($query) {
echo "<script>alert('Ticket booked successfully');</script>";
header("Location: succes.php");
} else{
echo "<script>alert('Transaction failed. Please try again');</script>";
}}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    
  @import 'book.css';
		
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;

    
}  
#train{
	color:black;
}
</style>
</head>
<body>
<?php
		include ('header.php');
	?>
	<?php
	   if(isset($_SESSION['user_info'])){
	
   echo '<div id="booktkt">
<div class="signup-form">
    <form  method="POST" enctype="multipart/form-data"  >
		<h2>Fill Data</h2>
		<p class="hint-text">Fill below form.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="fname" placeholder="First Name" required="true"></div>
				
			</div>        	
        </div>
        <div class="form-group">
		<input type="email" class="form-control" name="email" placeholder="Enter your Email id" required="true">
           
        </div>
        <div class="form-group">
		<input type="text" class="form-control" name="contactno" placeholder="Enter your Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
        </div>
		
		<div class="form-group">
        <select id="trains" name="trains" required style="color:black;">
			<option selected disabled>-----------🚆----Select trains here------🚆------</option>
			<option value="rajdhani"style="color:black;"> Rajdhani Express - Asansol to Ladakh</option>
			<option value="duronto" style="color:black;">Duronto Express - Asansol to kashmir </option>
			<option value="geetanjali" style="color:black;">Geetanjali Express - Asansol to gangtok</option>
			<option value="garibrath" style="color:black;"> Garib Rath - Asansol to dubai </option>
			<option value="mysoreexp"style="color:black;"> Mysore Express - Asansol to england</option>
		</select>
        </div>  
             <div class="form-group">
        	<input type="file" class="form-control" name="profilepic"  required="true">
        	<span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div>      
      
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="ok">Submit</button>
        </div>
    </form>
	<div class="text-center" style="color:yellow;font-size: 20px; ">View Aready Booked Ticket!!  <a href="viewbook.php">View</a></div>
</div>
</div>';
	   }

else{
   echo ' 
   
   <div id="main">
   <h1 align="center" style=" border-radius: 40px;"><img  src="img/logo1.jpg" alt="" width="100px" height="100px"></h1> 
   <h1 align="center" >
	   <div class="wrapper four">
		 <div class="type">
			 <h3 class="typing">Welcome to your ticket booking system!</h3><br>
		 </div>
	 </div>
   </h1>
   
   <h3 align="center" class="not">😎Not live your track like a train😎</h3><br><br>
   <br/><br/>
   <h3 align="center" class=""><a href="register.php">Please register/login before booking</a></h3>
</div><br>
<h1 align="center"  class="you" style="border: 2px solid black;"> You must visit this place</h1>

<div class="slideshow-container">

<div class="mySlides fade" >
<div class="numbertext">1 / 3</div>
<img src="img/MANLI.jpg"width="100%" height="490" >
<div class="text"><h1 >_MANALI_</h1></div>
</div>

<div class="mySlides fade">
<div class="numbertext">2 / 3</div>
<img src="img/LADAK.jpg" width="100%" height="490">
<div class="text"><h1 >_LAI LADAK_</h1></div>
</div>

<div class="mySlides fade">
<div class="numbertext">3 / 3</div>
<img src="img/KASMIR.jpg" width="100%" height="490">
<div class="text"><h1 >_KASMIR_</h1></div>
</div>

</div>
<br>

<div style="text-align:center">
<span class="dot"></span> 
<span class="dot"></span> 
<span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
let i;
let slides = document.getElementsByClassName("mySlides");
let dots = document.getElementsByClassName("dot");
for (i = 0; i < slides.length; i++) {
slides[i].style.display = "none";  
}
slideIndex++;
if (slideIndex > slides.length) {slideIndex = 1}    
for (i = 0; i < dots.length; i++) {
dots[i].className = dots[i].className.replace(" active", "");
}
slides[slideIndex-1].style.display = "block";  
dots[slideIndex-1].className += " active";
setTimeout(showSlides, 1900); // Change image every 2 seconds
}
</script>
<div class="row" align="center">
<div class="column">
<img src="img/ooty.jpg" alt="Snow" width="490" height="300">

<h1>OOTY<h1>
<h3><a href="https://www.youtube.com/watch?v=9e6YhHcsJo4&ab_channel=indiavideodotorg"> VIEW HERE</a> </h3>
</div>
<div class="column">
<img src="img/gangtok.jpg" alt="Forest" width="490" height="300">
<h1>GANGTOK<h1>
 <h3><a href="https://www.youtube.com/watch?v=USyZhIC60gs&ab_channel=Distancebetween"> VIEW HERE</a> </h3>
</div>
<div class="column">
<img src="img/banaras.jpg" alt="Mountains" width="490" height="300">
<h1>BANARAS<h1>
 <h3><a href="https://www.youtube.com/watch?v=fHslW_6ks38&ab_channel=PopcornTrip"> VIEW HERE</a> </h3>
 <audio controls autoplay src="music/book.mp3" style="display:none" >
</div>
</div>  ';
}
?>
</body>
</html>