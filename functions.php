<?php
$dbhost = 'localhost';
$dbname = 'testdb';
$dbuser = 'priyank';
$dbpass = 'mypass';
$appname = 'PRIYANK_1ST';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn){
	die("connection failed".mysqli_connect_error());
}


function createDB($name, $query){
	//$dbname = $query + $name;
	global $conn;
	$dbname = "create table if not exists $name($query)";
	//mysqli_query($conn, "create table if not exists $name($query)");
	mysqli_query($conn, $dbname);
	echo "table create by name $name";



}

function issueQuery($query){
	if(!mysql_query($conn, $query)){
		echo "query was successful";

	}
	else{
		echo "query have some problem";

	}

}
function remove($input){
	
	global $conn;
	$input = stripslashes($input);
	$input = htmlentities($input);
	return mysqli_real_escape_string($conn, $input);




}
function showProfile($name){
	if(file_exists("$name.png")){
		echo "<img src='$name.jpg' style='float:left;'>";
		$query = "select * from table where name ="+"$name";
		$result = mysql_query($conn, $query);

	}
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			echo "Firstname".$row["firstname"]."Lastname".$row["lastname"]."Company".$row["company"]."<br style= 'clear:left;'><br>";

		}
	}

}

?>
