<?php
require("../../cse476/db.inc");

// Connect to the database
$pdo = pdo_connect();

$query = <<<QUERY
SELECT gamexml FROM stacker_game
QUERY;

$rows = $pdo->query($query);
$row = $rows->fetch();

echo $row['gamexml'];
?>