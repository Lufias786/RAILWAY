<?php
session_start();
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'railway');
$conn = mysqli_connect("localhost","root","","railway");

$r=$_SESSION['user_info'];
$sql = "SELECT * FROM passengers WHERE email='$r' ";
$r = mysqli_query($conn,$sql);
?>
<style>
 table
{
  border: 1px solid #000;
  width: 100%;
  margin-top: 50px;
  background-color: rgba(0,0,0,0.3);
 
  

}
input[type="text"],input[type="email"],input[type="password"]
{
  width: 100%;
  height: 32px ;
  border: 1px solid green ;
  border-radius: 14px;
  
}
input[type="submit"]
{
  width: 100%;
  height: 32px;
  border: 1px solid black;
  background-color: aqua;
  text-decoration: none;
}
  </style>
 
   <!--  HTML(CODE) FOR NAVIGATION BAR -->
   <?php
		include ('header.php');
	?>


<?php


$conn = mysqli_connect("localhost","root","","railway");
$r=$_SESSION['user_info'];

$sql = "SELECT * FROM passengers WHERE email='$r' " ;
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
if (isset($_SESSION['user_info'])) {
    
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="logout2.css"> 
<style>
  #loginarea12{
    
    border:2px solid black;
   
padding: 5px;
background: #fff;
border-radius: 15px;
align-items:center ;
justify-content: center;
background-color: white;
		width: 30%;
		margin: auto;
		border-radius: 25px;
		border: 2px solid blue;
		margin-top: 100px;
		background-color: rgb(255, 255, 255);
	    box-shadow: inset -2px -2px rgba(0,0,0,0.5);
	    padding: 20px;
	    font-family:sans-serif;
		font-size: 20px;
		color: white;
        
    
}

  /*------------------------- for logout button style css code------------------------------------ */
#submit1	{
    border-radius: 15px;
    background-color: rgb(61, 171, 204);
    padding: 7px 7px 7px 7px;
    box-shadow: inset -1px -1px rgba(0,0,0,0.5);
    font-family:"Comic Sans MS", cursive, sans-serif;
    font-size: 25px;
    margin:auto;
    margin-top: 20px;
      display:block;
      color: rgb(0, 0, 0);
      text-decoration: none;
      width:130px;
}
#submit1:hover	{
    border-radius: 15px;
    background-color: rgb(204, 61, 61);
    padding: 7px 7px 7px 7px;
    box-shadow: inset -1px -1px rgba(0,0,0,0.5);
    font-family:"Comic Sans MS", cursive, sans-serif;
    font-size: 26px;
    margin:auto;
    margin-top: 20px;
      display:block;
      color: rgb(0, 0, 0);
}
</style>
</head>
<body>

	<title>HOME</title>
	 
<div id="loginarea12" >
  
	<form id="login" action="login.php" onsubmit="return validate()" method="post" name="login">
	<div id="logintext">Login </div><br/><br/>
	<table >
		<div class="data">  <h1 >Hello, <?php echo $user['p_fname'];?></h1><br><br></div>
		<div class="data"><div >   <a href="logout.php" id="Submit1"  class="active" align="center" >Logout</a>
  </div></div><br/><br/></div>
	</table>

	</form></div>

</body>
</html>

<?php
}else{
     header("Location: MAIN.php");
     exit();
}
 ?>