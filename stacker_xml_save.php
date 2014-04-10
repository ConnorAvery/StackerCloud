<?php
require("../../cse476/db.inc");

echo '<?xml version="1.0" encoding="UTF-8" ?>';

// Connect to the database
$pdo = pdo_connect();

$xml = $_GET['xml'];

$xmlQ = $pdo->quote($xml);

$query = <<<QUERY
	UPDATE  `stacker_game` SET  `gamexml` =  $xmlQ WHERE 1
QUERY;

if($pdo->query($query)){
		echo '<stacker save="yes" />';
}
else{
		echo '<stacker save="no" />';
}
?>