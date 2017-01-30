<?php

function users_get()
{
	$folder = "./private";
	$path = $folder . "/users";

	if (!file_exists($folder))
		mkdir($folder, 0777, true);

	if (!(file_exists($path)))
		$users = array();
	else
	{
		$users_serialized = file_get_contents($path);
		$users = unserialize($users_serialized);
	}

	return ($users);
}
?>
