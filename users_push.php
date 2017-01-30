<?php

function users_push($users)
{
	$folder = "./private";
	$path = $folder . "/users";

	if (!file_exists($folder))
		mkdir($folder, 0777, true);

	$users_serialized = serialize($users);
	file_put_contents($path, $users_serialized);
	return (true);
}
?>
