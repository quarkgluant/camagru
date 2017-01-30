<?php

header("Location: category_create.php");

include("./category_get.php");
include("./category_push.php");

if (strlen($_POST['name']) <= 0)
	exit("ERROR\n");

$category = category_get();

foreach($category as $key => $entry)
{
	if ($entry === $_POST['name'])
	{
		unset($category[$key]);
		array_values($category);
		category_push($category);
		exit("OK\n");
	}
}
exit("ERROR\n");

?>
