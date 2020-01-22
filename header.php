<?php
//session_start()
require_once 'functions.php';


echo "<!DOCTYPE html>\n<html><head>"; 


$username = '   (GUEST)';

if(isset($_SESSION['user'])){
	$username = $_SESSION['user'];
	$loggin = TRUE;

}
else $loggin=FALSE;
echo "<title>$appname$username</title><link rel='stylesheet' href='style.css' type='text/css'";
echo "</head><body><centre><canvas id='logo' width='624' height='324'>$appname$username</canvas></centre>";
echo "<div class='appname'>$appname$username</div><script src='javascript.js'></script>";


if($loggin){
	echo "<br><ul class='menu'>";
	echo "<li><a href='member.php'?view=$user'>Home</a></li>";
	echo "<li><a href='profile.php'>My Profile</a></li>";
	echo "<li><a href='menu.php'>Menu</a></li>";
	echo "<li><a href='friends.php'>Friends</a></li>";
	echo "<li><a href=messages.php'>Messages</a></li></ul><br>";

}

else{

	echo "<br><ul class='menu'>";
	echo "<li><a href='index.php'>Home</li></a>";
	echo "<li><a href='login.php'>Login</a></li>";
	echo "<li><a href='signUp.php'>Sign_UP</a></li></ul><br>";
	echo "<span style='color:blue;font-weight:italic'></span>";


}





?>