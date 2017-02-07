<?php
include_once  __DIR__ . "/modeles/model.php";

function auth($login, $passwd)
{
	$users = getUsers();

    var_dump($users);
	foreach($users as $entry)
	{
		if ($entry['login'] === $login)
		{
			$passwd_hash = hash('whirlpool', $passwd);
			if ($passwd_hash == $entry['password'])
			{
				if (isset($entry['admin']))
					return (2);
				else
					return (1);
			}
			else
				return (0);
		}
	}
	return (0);
}

?>
