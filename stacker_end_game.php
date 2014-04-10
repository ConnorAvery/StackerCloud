<?php
require("../../cse476/db.inc");

// Connect to the database
$pdo = pdo_connect();

$query = <<<QUERY
DELETE FROM `stacker_game` WHERE 1
QUERY;

if($pdo->query($query)){
		echo '<stacker end="yes" />';
}
else{
		echo '<stacker end="no" />';
}
?>