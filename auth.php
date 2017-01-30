<?php

include("./users_get.php");
include("./users_push.php");

function auth($login, $passwd)
{
	$users = users_get();

	foreach($users as $entry)
	{
		if ($entry['login'] === $login)
		{
			$passwd_hash = hash('whirlpool', $passwd);
			if ($passwd_hash == $entry['passwd'])
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
