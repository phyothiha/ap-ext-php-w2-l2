<?php 

// Connect to the database
define('USER', 'root');
define('PASS', '');
define('HOST', 'localhost');
define('DBNAME', 'php');

// optional parameters
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

$pdo = new PDO(
    'mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS, $options
);