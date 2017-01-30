<?php

function items_get()
{
    $folder = __DIR__ . "/../../private";
	$path = $folder . "/items";

	if (!file_exists($folder) || !(file_exists($path)))
		return (NULL);

	$items_serialized = file_get_contents($path);
	$items = unserialize($items_serialized);
	return ($items);
}
?>
