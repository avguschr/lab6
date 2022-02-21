<?php
$host = 'localhost';
$database = 'publications';
$user = 'root';
$password = '';

$mysqli = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno($mysqli)) {
   echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM classics";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));

