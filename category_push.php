<?php

function category_push($category)
{
	$folder = "./private";
	$path = $folder . "/category";

	if (!file_exists($folder))
		mkdir($folder, 0777, true);

	$category_serialized = serialize($category);
	file_put_contents($path, $category_serialized);
	return (true);
}
?>
