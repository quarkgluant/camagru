<?php

session_start();

header("Location: user_create_admin.php");

include("./users_get.php");
include("./users_push.php");

$users = users_get();

var_dump($_POST);

foreach($users as $key => $user)
{
	if ($user['login'] == $_POST['name'])
	{
		unset($users[$key]);
		array_values($users);
		users_push($users);
	}
}

?>
