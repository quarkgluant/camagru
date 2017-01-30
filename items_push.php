<?php

function items_push($items)
{
	$folder = "./private";
	$path = $folder . "/items";

	if (!file_exists($folder))
		mkdir($folder, 0777, true);

	$items_serialized = serialize($items);
	file_put_contents($path, $items_serialized);
	return (true);
}
?>
