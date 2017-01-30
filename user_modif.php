<?php

header("Location: index.php");

include("./users_get.php");
include("./users_push.php");

if ($_POST['submit'] != 'OK' || strlen($_POST['login']) <= 0 || strlen($_POST['oldpw']) <= 0 || strlen($_POST['newpw']) <= 0)
	exit("ERROR\n");

$users = users_get();

foreach($users as $key => $user)
{
	if ($user['login'] == $_POST['login'])
	{
		$old_passwd_hash = hash('whirlpool', $_POST['oldpw']);
		if ($old_passwd_hash == $user['passwd'])
		{
			$new_passwd_hash = hash('whirlpool', $_POST['newpw']);
			$users[$key]['passwd'] = $new_passwd_hash;
			users_push($users);
			exit("OK\n");
		}
		else
			exit("ERROR\n");
	}
}
exit("ERROR\n");

?>
