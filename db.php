<?php
$host = 'localhost';
$db = 'your_db';
$user = 'your_user';
$pass = 'your_password';

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>