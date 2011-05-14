<?php

$link = mysql_connect('localhost', 'root', 'necumpico');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

$db = mysql_select_db('eve', $link);

if (!$db) {
    die('Could not select db: ' . mysql_error());
}
echo 'Db selected successfully';

$file = file('eve.csv');

foreach ($file as $line) {
	
	$data = explode(';', $line);
	
	$result = mysql_query("INSERT INTO `eveNames2` (`itemID`, `itemName`, `categoryID`, `groupID`, `typeID`)
				VALUES ('".$data[0]."', '".addslashes($data[1])."', '".$data[2]."', '".$data[3]."', '".$data[4]."');");
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}
}



mysql_close($link);