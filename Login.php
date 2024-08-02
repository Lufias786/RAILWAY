<?php
session_start();
if (isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$email=$_POST['email'];
$pw=$_POST['pw'];
$sql = "SELECT * FROM passengers WHERE email = '$email' AND password = '$pw';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['email'];
			$message='Logged in successfully';
			header("Location: MAIN.php");
		}
		else{
			$message = 'Wrong email or password.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚉_RAILWAY_🚉</title>
    <link rel="stylesheet" href="login_STYLE.css" type="text/css">
    <link rel="stylesheet" href="login_ANIMATION.css" type="text/css">
    <!-- <link rel="stylesheet" href="login_SLIDER.css" type="text/css"> -->
    
    <script src="jquery.js"></script>
    <!-- IT WILL CHECK CURRECT MAIL BASSWORLS FROM MYSQL SERVER -->
    <script type="text/javascript">
        function validate()	{
            var EmailId=document.getElementById("email");
            var atpos = EmailId.value.indexOf("@");
            var dotpos = EmailId.value.lastIndexOf(".");
            var pw=document.getElementById("pw");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
            {
                alert("Enter valid email-ID");
                EmailId.focus();
                return false;
               }
               if(pw.value.length< 8)
            {
                alert("Password consists of atleast 8 characters");
                pw.focus();
                return false;
            }
            return true;
        }
    </script>
    <style>
        body{
            background-color: #1690A7;
            align-items:center ;
            justify-content: center;
        }
       
        #loginarea:hover{
    border:2px solid black;
    
    
    background-image: linear-gradient(-45deg, #ff5959, #ff4040, #ff0d6e, #ff8033,#d74177);
    animation: 12s myGradient infinite;
    
    box-shadow: 3px 3px 20px #ff3352;
}
#submit{
  font-size:20px;
}
#submit:hover	{
    border-radius: 50px;
    font-size: 25px;
    background-color: rgb(0, 255, 128);
  color:black;
  border: 3px solid black;
  -webkit-filter: drop-shadow(10px 10px 10px rgb(157, 255, 0));
  filter: drop-shadow(16px 16px 20px rgb(213, 255, 2));
  text-decoration: none;
}

        
        
    </style>
      
</head>

<body>
    <!--  HTML(CODE) FOR NAVIGATION BAR -->
    <?php include("header.php") ?>

        

    
	<div id="loginarea">
	<form id="login" action="login.php" onsubmit="return validate()" method="post" name="login">
	<div id="logintext">Login </div><br/><br/>

	<table>
		<tr><td><div class="data">Enter E-Mail ID:</div></td><td><input type="text" id="email" size="30" maxlength="30" name="email"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><div class="data">Enter Password:</div></td><td><input type="password" id="pw" size="30" maxlength="30" name="pw"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	</table>
	<INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button">
	</form></div>

    <audio controls autoplay src="music/login.mp3" style="display:none" >


</body>

</html>