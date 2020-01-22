<?php

require_once 'header.php';

if(isset($_GET['view'])){

	$sql = "select * from member where user ='".$view."'";
	$result=mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)){
		showProfile($view);
		echo "<a class='button' href='messages.php?viewMSG=$view'>To see messages </a><br>";
		echo "<a class='button' href='friends.php?view=$view'>To See friends</a><br>";
		}


	
}
if(isset($_GET['add'])){
	$friend = remove($_GET['add']);
	$sql = "select * from friends where user ='".$user."'and friend ='".$friend."'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)){
		$sql3 = "insert into friends (friend) values('".$view."')";
		$result3 =mysqli_query($conn, $sql3);

	}

}
if(isset($_GET['remove'])){
	$friend = remove($_GET['remove']);
	$sql4 = "delete from friends where user='".$user."'and friend='".$friend."'";
	$result4 = mysqli_query($conn, $sql4);
	echo "You just unfollowed this person".$friend;

}
$sql5 = 'select * from member';
$result6 = mysqli_query($conn, $sql5);
$num = mysqli_num_rows($result6);
 
for ($i=0; $i<$num; $i++){

	$row = mysqli_fetch_row($conn, MYSQLI_ASSOC);
	echo "<li><a href='member.php?view".$row['user']."'>>".$row['user']."</a>";





	$sql1 = "select friend from friends where user='".$row['user']."'and friend='".$user."'";
	$result7 = mysqli_query($conn, $sql);
	$t1=0;
	$t1=mysql_num_rows($result7);
	$sql8 ="select friend from friends where user='".$user."'and friend='".$row['user']."'";
	$result8= mysqli_query($conn, $sql8);
	$t2=0;
	$t2=mysql_num_rows($result8);
	
	if($t1+$t2>1){
		echo $row['user'].$user."both are mutual friends";
	}
	elseif ($t1=1) {
		echo $row['user']. "follows".$user;

	}
	elseif ($t2=1) {
		echo $user.'follows this person'.$row['user'];
	}
	if(!t1) echo "[<a href='member.php?add".$row['user']."'>follow</a>]";
	else echo "[<a href='member.php?remove".$row['user']."'>drop</a>]";
	
	
}
?>