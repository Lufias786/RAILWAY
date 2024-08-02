
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #1690A7;
        }
        #center{
            color:red;
        }
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
		color: black;  
}
 #loginarea12:hover{
    border:2px solid black;
    background-color: ;
    border-radius: 1px;
    padding: 5px;
    text-decoration: none;
    background-image: linear-gradient(-45deg, #ff5959, #ff4040, #ff0d6e, #ff8033,#d74177);
    animation: 12s myGradient infinite;
    border-radius: 40px;
    box-shadow: 3px 3px 20px #ff3352;
}

  /*------------------------- for logout button style css code------------------------------------ */
  .active	{
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

.active:hover	{
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
    <div id="center" align="center">
   
    </div>
    <div id="loginarea12" >
  
	<form id="login" action="login.php" onsubmit="return validate()" method="post" name="login">
	<div id="logintext" align="center" style="font-size: 30px;">Booking</div>
	<table >
		<div class="data" align="center">  <h1> Ticked Succesfuly Book</h1> </div>
        <div class="data" align="center">  <h1> or</h1> </div>
		<div class="data" align="center"><div >   <a href="book.php"   class="active" align="center" >Book More</a>
  </div></div><br/><br/></div>
	</table>

	</form></div>
  
</body>
</html>