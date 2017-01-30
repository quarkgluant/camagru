<?php

header("Location: item_create.php");

include("./items_get.php");
include("./category_get.php");
include("./items_push.php");


if (strlen($_POST['name']) <= 0)
	exit("No name\n");

$items = items_get();
$category = category_get();

if (isset($items))
{
	foreach($items as $entry)
	{
		if ($entry === $_POST['name'])
			exit("Item already exists\n");
	}
}

$i = 0;
if (isset($category))
{
	foreach($category as $entry)
	{
		if (isset($_POST[$entry]))
		{
			$i++;
			$item_categories[] = $entry;
		}
	}
}

if ($i == 0)
	exit();

$items[] = array('name' => $_POST['name'], 'pu' => $_POST['pu'], 'categories' => $item_categories);

var_dump($items);

items_push($items);

exit("OK\n");

?>
