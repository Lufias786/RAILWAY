<!-- TO SEND DATA AND STORE DATE IN MSQL DATA BASE -->
<?php
session_start();
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$mob=$_POST['mob'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$pw=$_POST['pw'];
$cpw=$_POST['cpw'];
$sql = "INSERT INTO passengers (p_fname, p_lname, p_age, p_contact, p_gender, email, password) VALUES ('$fname', '$lname', '$age', '$mob', '$gender', '$email', '$pw');";
	if(mysqli_query($conn, $sql))
{  
	$message = "You have been successfully registered <br> 🙏 welcome 🙏 '$fname'";
}
else
{  
	$message = "Could not insert record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!-- REGISTER FORM CREATION AND NAV CREATION CODE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDIAN_RAILWAY</title>
    <link rel="stylesheet" href="reg_STYLE.css" type="text/css">
    <link rel="stylesheet" href="reg_ANIMATION.css" type="text/css">
  
    <SCRIPT src="CHECK.js"></SCRIPT>
    <script src="jquery.js"></script>
   
    
<style>
  
svg text {
  text-transform: uppercase;
  animation: stroke 5s infinite alternate;
  stroke-width: 2;
  stroke: #365fa0;
  font-size: 90px;
}
@keyframes stroke {
  0%   {
    fill: rgba(72,138,20,0); stroke: rgba(54,95,160,1);
    stroke-dashoffset: 25%; stroke-dasharray: 0 50%; stroke-width: 2;
  }
  70%  {fill: rgba(72,138,20,0); stroke: rgba(54,95,160,1); }
  80%  {fill: rgba(72,138,20,0); stroke: rgba(54,95,160,1); stroke-width: 3; }
  100% {
    fill: rgba(72,138,204,1); stroke: rgba(54,95,160,0); 
    stroke-dashoffset: -25%; stroke-dasharray: 50% 0; stroke-width: 0;
  }
}
</style>
</head>

<body>

    <!--  HTML(CODE) FOR NAVIGATION BAR -->
    <?php
		include ('header.php');
	?>
    
    
       <!-- FOR LOGIN BOX  -->
        <div id="main" align="center" height="200" width="200">
            <FORM name="register" method="post" action="register.php" onsubmit="return validate()">
            <TABLE border="0">
            <CAPTION><FONT size="8" color="WHITE" ><br/>
            <svg viewBox="0 0 1320 300" class="neons col-12">
        <text x="50%" y="50%" dy=".35em" text-anchor="middle">
          Enter your details:
        </text>
      </svg> 
      
                 </div></FONT></CAPTION>
            <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <audio controls autoplay src="music/reg.mp3" style="display:none" >
            <TR class="left">
            <TD><FONT size="5" color="WHITE">First name:</FONT></TD>
            <TD><INPUT name="fname" type="TEXT" placeholder="Enter your first name" size="30" maxlength="30" align="center" id="fname"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
            <TD><FONT size="5" color="WHITE">Last name:</FONT></TD>
            <TD><INPUT type="TEXT" name="lname" align="center" size="30" maxlength="30" placeholder="Enter your last name" id="lname"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
            <TD><FONT size="5" color="WHITE">Age:</FONT></TD>
            <TD><INPUT type="TEXT" name="age" align="center" size="30" maxlength="3" placeholder="Enter age" id="age"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
            <TD><FONT size="5" color="WHITE">Mobile Number:</FONT></TD>
            <TD><INPUT type="TEXT" name="mob" size="30" maxlength="10" placeholder="Enter your mobile number" id="mob"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
            <TR class="left">
            <TD><FONT size="5" color="WHITE">Gender:</FONT></TD>
            <TD>&nbsp;&nbsp;
            <INPUT type="radio" name="gender" value="Male" align="center" id="gender">Male
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender" value="Female" align="center" id="gender">Female
            </TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
            <TD><FONT size="5" color="WHITE">E-Mail ID:</FONT></TD>
            <TD><INPUT name="email" type="TEXT" id="email" placeholder="Enter your E-Mail ID" size="30" maxlength="30"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
            <TD><FONT size="5" color="WHITE">Password:</FONT></TD>
            <TD><INPUT type="PASSWORD" name="pw" size="30"  id="pw"></TD>
            </TR><tr></tr><tr></tr>
            <TR class="left">
            <TD><FONT size="5" color="WHITE">Confirm Password:</FONT></TD>
            <TD><INPUT type="PASSWORD" name="cpw" size="30" id="cpw"></TD>
            </TR><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr></tr><tr></tr><tr></tr>
            </TABLE>
            <P><INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button" onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <INPUT TYPE="Reset" value="Reset" id="reset" class="button"></P></FORM><br/>
            <HR width="450" style="border-color: blue;display: block;" noshade>
            <FORM action="login.php">
            <P align="CENTER" id="logintext"><FONT size="6" color="white" face="Arial" class="animate-charcter ">
            Already have an account?<BR/></FONT></FONT><br>
            <INPUT TYPE="submit" value="Login" id="login" class="button">
            </P>
            </FORM></div>
        </div>
        <br>
        <br>
        <br>




    </div>
       


</body>

</html>