<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

echo 'DB_SERVER: ' . $servername . PHP_EOL;
echo 'DB_USER: ' . $username . PHP_EOL;
echo 'DB_PASS: ' . $password . PHP_EOL;
echo 'DB_NAME: ' . $dbname . PHP_EOL;