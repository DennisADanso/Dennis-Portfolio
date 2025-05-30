<?php
include 'includes/auth.php';
include 'includes/db.php';

if (isset($_GET['mark_read'])) {
    $id = $_GET['mark_read'];
    $conn->query("UPDATE messages SET is_read=1 WHERE id=$id");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM messages WHERE id=$id");
}

$result = $conn->query("SELECT * FROM messages");
while ($msg = $result->fetch_assoc()) {
    echo "<p>{$msg['name']} - {$msg['message']} 
    <a href='?mark_read={$msg['id']}'>Mark as Read</a> 
    <a href='?delete={$msg['id']}'>Delete</a></p>";
}
?>