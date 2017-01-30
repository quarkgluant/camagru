<?php

include("./users_push.php");
include("./category_push.php");
include("./items_push.php");

$passwd_hash = hash('whirlpool', 'admin');
$users[] = array('login' => 'admin', 'passwd' => $passwd_hash, 'admin' => 'true');
users_push($users);

$categories =  array('tennis', 'football', 'pingpong', 'ski');
category_push($categories);

$item_categories =  array('ski', 'football');
$items[] = array('name' => 'ballon', 'pu' => 15, 'categories' => $item_categories);

$item_categories =  array('tennis');
$items[] = array('name' => 'raquette', 'pu' => 100, 'categories' => $item_categories);

$item_categories =  array('ski');
$items[] = array('name' => 'batons', 'pu' => 60, 'categories' => $item_categories);

$item_categories =  array('tennis', 'pingpong');
$items[] = array('name' => 'balles', 'pu' => 15, 'categories' => $item_categories);
items_push($items);

?>
