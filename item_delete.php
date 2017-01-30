<?php

header("Location: item_create.php");

include("./items_get.php");
include("./items_push.php");

if (strlen($_POST['name']) <= 0)
	exit("ERROR\n");

$items = items_get();

foreach($items as $key => $entry)
{
	if ($entry['name'] === $_POST['name'])
	{
		unset($items[$key]);
		array_values($items);
		items_push($items);
		exit("OK\n");
	}
}
exit("ERROR\n");

?>
