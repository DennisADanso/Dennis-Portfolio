<?php
include 'includes/auth.php';
include 'includes/db.php';

if ($_SESSION['role'] != 'super') die("Unauthorized");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
    $stmt = $conn->prepare("INSERT INTO admins (username, password, role) VALUES (?, ?, 'admin')");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    echo "Admin created!";
}
?>