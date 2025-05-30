<?php
include 'includes/auth.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $education = $_POST['education'];

    $conn->query("DELETE FROM about");
    $stmt = $conn->prepare("INSERT INTO about (name, experience, skills, education) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $experience, $skills, $education);
    $stmt->execute();
}
?>