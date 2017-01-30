<?php

function category_get()
{
	$folder = "./private";
	$path = $folder . "/category";

	if (!file_exists($folder) || !(file_exists($path)))
		return (NULL);

	$category_serialized = file_get_contents($path);
	$category = unserialize($category_serialized);
	return ($category);
}
?>
