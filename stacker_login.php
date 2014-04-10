<?php
require("../../cse476/db.inc");

echo '<?xml version="1.0" encoding="UTF-8" ?>';

// Connect to the database
$pdo = pdo_connect();

$username = $_GET['username'];
//echo $username;
$password = $_GET['password'];
//echo $password;

$usernameQ = $pdo->quote($username);

$query = <<<QUERY
SELECT count(*) as count FROM stacker_user WHERE username = $usernameQ
QUERY;

$rows = $pdo->query($query);
$row = $rows->fetch();
//VAR_DUMP($rows);

if($row['count'] == 1)
{
	$query = <<<QUERY
	SELECT password FROM stacker_user WHERE username = $usernameQ
QUERY;
	$rows = $pdo->query($query);
	$row = $rows->fetch();
	//VAR_DUMP($rows);
	if($password == $row['password'])
	{
		//check for existing game
		$query = <<<QUERY
		SELECT count(*) as count FROM stacker_game
QUERY;
		$rows = $pdo->query($query);
		$row = $rows->fetch();
		if($row['count'] == 1)
		{
			$query = <<<QUERY
			UPDATE  `stacker_game` SET  `user2` =  $usernameQ WHERE 1
QUERY;
		$pdo->query($query);
		}
		else{
		//create new game
		$query = <<<QUERY
		INSERT INTO  `stacker_game` (  `user1` ) VALUES ($usernameQ)
QUERY;
		$pdo->query($query);
		}
		echo '<stacker login="yes" />';
	}
	else{
		echo '<stacker login="no" />';
	}
}
else{
	echo '<stacker login="no" />';
}

?>