<?php 
session_start();
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$pnr=$_POST['pnr'];
$sql = "SELECT status FROM tickets WHERE PNR= '$pnr'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
	if($row==NULL)	echo "<script type='text/javascript'>alert('PNR not found');</script>";
	else echo "<script type='text/javascript'>alert('Your status is ' +'$row[status]');</script>";	
}
if (isset($_POST['cancel']))
{
$pnr=$_POST['pnr'];
$sql = "DELETE FROM tickets WHERE PNR=$pnr;";
if(mysqli_query($conn, $sql))
	echo "<script type='text/javascript'>alert('Your ticket has been cancelled');</script>";
	else echo "<script type='text/javascript'>alert('Cancellation failed');</script>";	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PNR Status</title>
	<link rel="stylesheet" href="pnr.css" type="text/css">
</head>
<body>
<?php
include("header.php"); ?>
<center>
	<div id="loginarea12">
	  <div id="logintext">Check your PNR status here:</div><br/><br>
	<form method="post" name="pnrstatus" action="pnr.php">
	<div>
		
	</div>	
         <input align="center" style="font-size: 20px;" type="text"  name="pnr" placeholder="ENTER YOUR PNR ">
	<br/><br/>
	<input style="color:black; width:auto;" type="submit" name="submit" value="Check here!" class="button" id="submit"><br/>
	 <h2 style="color:black;">or</h2>
	<?php  
		if(isset($_SESSION['user_info'])){
			echo '<form action="pnr.php" method="post"><input type="submit" class="button" value="Cancel your ticket!" name="cancel" id="cancel"/></form>';
        }
		else
			echo '<A HREF="register.php" style="  text-decoration: none;">Login/Register</A>';
		?>
	</form>
	</div>
</center>
</body>
</html>