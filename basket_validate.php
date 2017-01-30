<?php

session_start();

header("Location: basket_empty.php");

$_SESSION['basket'];

include("./users_get.php");
include("./users_push.php");

$users = users_get();

foreach($users as $key => $user)
{
	if ($user['login'] == $_SESSION['loggued_on_user'])
	{
		$users[$key]['basket'][] = $_SESSION['basket'];
		users_push($users);
		exit("OK\n");
	}
	else
		exit("ERROR\n");
}
exit("ERROR\n");


?>
