<?php

// header("Location: ../../public/index.php");


if ($_POST['submit'] != 'OK' || strlen($_POST['login']) <= 0 || strlen($_POST['oldpw']) <= 0 || strlen($_POST['newpw']) <= 0)
	exit("ERROR\n");

$users = getUsers();

foreach($users as $key => $user)
{
	if ($user['login'] == $_POST['login'])
	{
		$old_passwd_hash = hash('whirlpool', $_POST['oldpw']);
		if ($old_passwd_hash == $user['password'])
		{
			$new_passwd_hash = hash('whirlpool', $_POST['newpw']);
			$users[$key]['password'] = $new_passwd_hash;
			saveUser($users[$key]);
			exit("OK\n");
		}
		else
			exit("ERROR\n");
	}
}
exit("ERROR\n");

?>
