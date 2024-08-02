<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚉_RAILWAY_🚉</title>
    <link rel="stylesheet" href="STYLE.css" type="text/css">
    <link rel="stylesheet" href="ANIMATION.css" type="text/css">
    <link rel="stylesheet" href="SLIDER1.css" type="text/css">

    <script src="jquery.js"></script>
    <style>
/*------------------- style for login world---------------------- */
        h3 a{
            text-decoration: none; 
        }
        h3:hover a{
    border-radius: 50px;
    font-size: 25px;
    background-color: rgb(0, 255, 128);
  color:black;
  border: 3px solid black;
  -webkit-filter: drop-shadow(10px 10px 10px rgb(157, 255, 0));
  filter: drop-shadow(16px 16px 20px rgb(213, 255, 2));
  text-decoration: none;
  
}
/* style for book here */

#book{
    border:2px solid black;
    background-color: aqua;
    border-radius: 20px;
    padding: 5px;
    text-decoration: none;
}
#book:hover{
    border:2px solid black;
    background-color: ;
    border-radius: 20px;
    padding: 5px;
    text-decoration: none;
    background-image: linear-gradient(-45deg, #ff5959, #ff4040, #ff0d6e, #ff8033,#d74177);
    animation: 12s myGradient infinite;
    border-radius: 40px;
    box-shadow: 3px 3px 20px #ff3352;
}

  @import 'nav.css';
    </style>
      
</head>

<body>

    <!--  HTML(CODE) FOR NAVIGATION BAR -->
    <?php
		include ('header.php');
	?>
    
    <!--  -->
    <div class="BACK-GROUND"><br><br><br>
    
        <!-- FOR LOGIN BOX AND logo -->
        <div id="main">
            <!-- FOR Railways LOGO -->
            <div id="logo">
                <A HREF="MAIN.php">
                    <IMG SRC="img/L0G0.jpg" alt="Home" id="logo" width="150" height="150"></IMG>
                </A>
            </div>

            <!-- -->
            <h1 class="" align="center" style="font-size: 39x;"><div class="container">
                <div class="row">
                   <div class="neons col-12">
                      <h1><em>Welcome to Indian Railways!</em></h1>
                   </div>
                </div>
             </div></h1><br /><br /><br />
            <div class="content">
                
                <h2 align="center" class="text_shadows">Have a safe journey with us</h2>
              </div>
         
            <br /><br /><br />
            
            <?php
           if(isset($_SESSION['user_info'])){
                 echo '<h3 align="center"><a href="book.php" id="book"  class="active">Book here</a></h3>';
                 echo ' <audio controls autoplay src="music/succes.mp3" style="display:none" >';
            }
           else{
                echo '<h3 align="center" style="font-size: 26px;"><a href="register.php">Please register/login before booking</a></h3>';
                echo ' <audio controls autoplay src="music/main.mp3" style="display:none" >';
            }
             ?>
        </div>
        <br>
        <br>
        <br>

</html>