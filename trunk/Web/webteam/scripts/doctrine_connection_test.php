<?php
include_once 'Doctrine.php';
spl_autoload_register(array('Doctrine', 'autoload'));
$manager = Doctrine_Manager::getInstance();

$dsn = 'mysql:host=localhost;dbname=webteam';
$user = 'root';
$password = '';

$dbh = new PDO($dsn, $user, $password);
$conn = Doctrine_Manager::connection($dbh, 'doctrine');

//cehck connection returns 1 if ok
$databases = $conn->isConnected();
print_r($databases);
