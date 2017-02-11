<?php
require_once('database.php');
$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$sql = file_get_contents('base.sql');
$qr = $db->exec($sql);
