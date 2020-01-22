<?php
require_once 'header.php';

$user= $pass = $error ="";
echo "enter your credentials here";

if (isset($_POST['user'])){
	$user = remove($_POST['user']);
	$pass = remove($_POST['pass']);
	$sql_first = "select user, pass from member where user=$user and pass=$pass";
	$result = mysqli_query($conn, $sql_first);
	if(mysqli_num_rows($result)){
			echo "invalid credentials";

		
	}

	else{
		$_SESSION['user']=$user;
		$_SESSION['pass']=$pass;
		die ("You are now logged in <a href='members.php?view=$user'>click here</a> to continue<br><br>");
	}

}
echo <<<_END
<form method='post' action='login.php'>$error
<span class='fieldname'>Username</span><input type='text'
maxlength='16' name='user' value='$user'><br>
<span class='fieldname'>Password</span><input type='password'
maxlength='16' name='pass' value='$pass'>
_END;
?>
<br>
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Login'>
</form><br></div>
</body>
</html>


