<?php
require_once 'header.php';

if(!$loggin) die();

if(isset($_POST['user'])){
	$sql2 = "select * from profile where user=$user";
	$result = mysqli_query($conn, $sql2);
	if(mysqli_num_rows($result)){
		$row = mysqli_fetch_assoc($result);
		echo "here is what you have written in about me %s",$row["about_me"];
		
	}


}

if (isset($_FILES['image']['name'])){
$saveto = '$user.jpg';
move_uploaded_file($_FILES['image']['tmp_name'], $saveto);


$taken =1;
switch ($_FILES['image']['type']){
	case"jpg": $src=imagecreatefromjpeg($saveto);
	            break;
	case"png": $src=imagecreatefrompng($saveto);
	            break;
	case"gif": $src=imagecreatefromgif($saveto);
	            break;
	default: $taken=0;
	           break;
}
 }

 if($taken){


	list($len, $wid) = getimagesize($src);
	$max= 100;
	//$tempL = $len;
	//$tempW = $wid;
	$tempL = floor($len *(20/$wid));

	
		$destination=imagecreatetruecolor(20, $tempL);
		imagecopy($destination, $src, 0, 0, 0, 0, $len, $wid);
		imagejpeg($destination, $saveto);
		imagedestroy($src);
		imagedestroy($destination);

	

}
showProfile($user);

echo <<<_END
<form action='profile.php' method='post' enctype='multipart/form-data'>
<h3> Enter or edit your detail and/or upload an image</h3>
<textarea name='text' cols='50' rows='5'> $text</textarea><br>
_END;
?>
Image <input type='file' name='image' size='14'>
<input type='submit' value='save profile'>
</form>
<br>
</body>
</html>