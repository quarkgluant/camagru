<?php

header("Location: category_create.php");

include("./category_get.php");
include("./category_push.php");

if ($_POST['submit'] != 'OK' || strlen($_POST['name']) <= 0)
	exit("ERROR\n");

$category = category_get();

if (isset($category))
{
	foreach($category as $entry)
	{
		if ($entry === $_POST['name'])
			exit("Category already exists\n");
	}
}

$category[] = $_POST['name'];

category_push($category);

echo "OK\n";

?>
