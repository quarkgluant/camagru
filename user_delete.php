<?php

session_start();

include("./users_get.php");
include("./users_push.php");

$users = users_get();

foreach($users as $key => $user)
{
	if ($user['login'] == $_SESSION['loggued_on_user'])
	{
		unset($users[$key]);
		array_values($users);
		users_push($users);
		$_SESSION['loggued_on_user'] = "";
	}
}

header("Location: index.php");

?>
