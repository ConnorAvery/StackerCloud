<?php
require("../../cse476/db.inc");

echo '<?xml version="1.0" encoding="UTF-8" ?>';

// Connect to the database
$pdo = pdo_connect();

$username = $_GET['username'];
$password = $_GET['password'];

$usernameQ = $pdo->quote($username);
$passwordQ = $pdo->quote($password);

$query = <<<QUERY
SELECT username FROM stacker_user WHERE username = $usernameQ
QUERY;

$rows = $pdo->query($query);
$row = $rows->fetch();

if(ISSET($row['username'])){
	echo '<stacker create="no" />';
}
else{
	$query = <<<QUERY
	INSERT INTO stacker_user (username, password) VALUES($usernameQ, $passwordQ)
QUERY;
	if($pdo->query($query)){
		echo '<stacker create="yes" />';
	}
}


?>