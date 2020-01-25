<?php 
if(!$loggin) die("you are not logged in");

require_once "header.php";

if ($_GET['view']) $view =remove($_GET['view']);
else $view =$user;

if($view = $user){
	$name1 = "Your";
	$name2 = "You are following";
}
else{
	$name1 = "$view's";
	$name2 = "$view's is following";

}

if($_POST['text']){
	if($_POST['radio']){
		$text = $_POST['text'];
		$radio = $_POST['radio'];
		$sql = "insert into messages values(NULL,'$user', '$view', '$radio', '$text', $time)";
		if(!mysqli_query($conn, $sql)){
			echo "Message was not send try again";
		}

	}
}
show_profile($view);
echo <<<_END
<form method ="post" action="messages.php?view=$view">
You can enter your message here
<textarea name ="text" columns= '70' rows='8'></textarea><br>
<input type="radio" name="radio" value="0"/> Public
<input type="radio" name="radio" value="1"/>private
<input type="submit" value="Post Messages"/>
</form>
_END;
$sql3 = "select auth, pm, msg from messages where auth='".$user."'or recip ='".$user."'";
$sql4 ="select auth, msg from messages where pm='0' ";
if($view=$user){
	$result=mysqli_quer($conn, $sql3);

}else $result =mysqli_query($conn, $sql4);

while($row =mysqli_fetch_array($result, MYSQLI_ASSOC){
	echo $name1." messages /n<br>";
	if( $row['pm']==1){
		echo "<i>whispered</i>".$row['text']." \n ".$row['pm']."<br>";
		echo "<a href= 'profile.php?user=$row['auth']'>$row['auth']</a>";

					}
	else echo $row['text']." \n ".$row['pm'];

}
echo 



