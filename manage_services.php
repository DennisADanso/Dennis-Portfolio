<?php
include 'includes/auth.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $tech = $_POST['technologies'];
    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$img");
    $stmt = $conn->prepare("INSERT INTO projects (title, description, technologies, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $desc, $tech, $img);
    $stmt->execute();
}
?>
<!-- Form to add/edit/delete project -->