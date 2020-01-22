 
<!DOCTYPE HTML>
<html>
<head>
<title>Creating DB</title>
</head>
<body>

<?php


require_once 'functions.php';


createDB('member', 'user varchar(16),
		pass varchar(16)
		index(user(6))');

createDB('messages', 'ID int unsigned auto_increment primary key,
		auth varchar(16),
		recip varchar(16),
		pm varchar(6),
		msg varchar(4096),
		time int unsigned,
		index(auth(6)),
		index(recip(6))');

createDB('friends', 'user varchar(16),
		friend varchar(16),
		index(user(6)),
		index(friend(6))');

createDB('profile', 'user varchar(16),
		about_me varchar(4096),
		index(user(6))');
?>
<br>....done
</body>
</html>
