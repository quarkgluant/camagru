<?php

// Identifiants pour la base de données. Nécessaires a PDO.
define('SQL_DSN',      'mysql:dbname=camagru;host=localhost');
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', 'root');

// Chemins à utiliser pour accéder aux vues/modeles/librairies
// $module = empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module;
define('CHEMIN_VUE',    'app/src/views/');
define('CHEMIN_MODELE', 'app/src/modeles/');

require_once('database.php');
$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$sql = file_get_contents('base.sql');
$qr = $db->exec($sql);
