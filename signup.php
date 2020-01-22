<?php 
require_once "function.php";

if(isset($_POST(user))){
	$sql ="select * from member where user=$user";
	$result = mysqli_query($conn, $sql);
	if ($mysqli_num_row($result)){
		echo "<span class='taken'>&nbsp;&#x2718 $user Username already taken</span>";
	}
	else{
		echo "<span class='available'>&nbsp;&#2814 all done</span>";sss
	}
}
?>

