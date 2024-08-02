<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDIAN railway</title>
    <style>
        @import 'nav.css';
    </style>
</head>
<body>
<nav>
		<ul class="nav-type">
		  <li><a href="MAIN.php" target="" class="active">Home</a></li>
		  <li><a href="pnr.php" target="" class="active1">PNR status</a></li>
		  <li><a href="book.php" target="" class="active2">Book ticket</a></li>
		  <li>
          <?php  
				if(isset($_SESSION['user_info'])){
				 echo '	<li><a href="my Booking.php" target="" class="active2">My Booking </a></li>';
					//echo '<div id="dropdown">'.$_SESSION['user_info'].'<div id="Logout" style="display:none"></div>';
                    echo '  <li><a href="logoutpage.php" target="" class="active2">My Profile</a></li>';
        }
				else
					echo '<A HREF="register.php"  target="" class="active3" >Login/Register</A>';
				?></</li>
		  
		</ul>
	  </nav>
	</div>
  </div>
</div>
</body>
</html>