<?php

header("Location: user_create_admin.php");

include("./users_get.php");
include("./users_push.php");

if ($_POST['submit'] != 'OK' || strlen($_POST['login']) <= 0 || strlen($_POST['passwd']) <= 0)
	exit("ERROR\n");

$users = users_get();

foreach($users as $user)
{
	if ($user['login'] === $_POST['login'])
		exit("ERROR\n");
}

$passwd_hash = hash('whirlpool', $_POST['passwd']);
if (isset($_POST['admin']))
	$users[] = array('login' => $_POST['login'], 'passwd' => $passwd_hash, 'admin' => 'true');
else
	$users[] = array('login' => $_POST['login'], 'passwd' => $passwd_hash, 'admin' => 'false');

users_push($users);

exit("OK\n");

?>
