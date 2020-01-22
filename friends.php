<?php 
require_once "header.php";
if(!$loggin) die();

if(isset($_GET['view'])) $user1 = $_GET['view'];
else 					$user1 =$user;

echo "<div class='main'>";

$sql ="select friend from friends where user='".$user1."'";
$result = mysqli_query($conn, $sql);
$array=array();
$array1=array();
//$array = mysqli_fetch_assoc($result);
//$solution = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    //echo ($row['user'])."\n";  // The number
//    echo ($row['friend'])."\n";  // The customer
	array_push($array, $row['friend']);}
	$sql2="select user from friends where friend='".$user1."'";
	$result2 = mysqli_query($conn, $sql2);
	foreach($row2 = mysqli_fetch_all($result2, MYSQLI_ASSOC) as $uservalue){
		array_push($array1, $uservalue['user']);
	}
	
	

$mutual = array_intersect($array, $array1);
$array = array_diff($array, $mutual);
$array1 = array_diff($array1, $mutual);
$friends = FALSE;


if(sizeof($mutual)){
	echo "People who follows you & Whom you also follow";
	foreach ($mutual as $value) {
		# code...
		echo "</li><a href='members.php?view=$value>$value</a>";
		echo "</ul>";
		$friends = TRUE;
	}
}
if(sizeof($array)){
	echo "Person whom you follow";
	foreach ($array as $value1) {
		# code...
		echo "</li><a href='members.php?view=$value1'>$value1</a>";	
		echo"</ul>";
		$FRIENDS = TRUE;
	}
}
if(sizeof($array1)){
	echo "Those who follows you";
	foreach ($array1 as $value2) {
		# code...
		echo "</li><a href='members.php?view=$value2'>$value2</a>";
		echo "</ul>";
		$friends = TRUE;
	}
}

if(!$friends){
	echo "you don't have any person who follows you or anyone whom you follow";
}

echo "<a href='message.php?view=$user'>View your messages</a>";
?>
</div><br>
</body>
</html>

