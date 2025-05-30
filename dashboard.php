<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/includes/auth_check.php';
$projects = 0;
$messages = 0;

try {
    $stmt = $conn->query("SELECT COUNT(*) AS count FROM projects");
    if ($stmt) {
        $projects = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }
} catch (PDOException $e) {
    // Log error and show user-friendly message
    error_log("Dashboard error: " . $e->getMessage());
    die("Error loading dashboard data. Please try again later.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php include __DIR__ . '/includes/header.php'; ?>
    
    <main class="dashboard">
        <h2>Admin Dashboard</h2>
        
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Projects</h3>
                <p><?= htmlspecialchars($projects) ?></p>
                <a href="projects.php">Manage Projects</a>
            </div>
            
            <div class="stat-card">
                <h3>Messages</h3>
                <p><?= htmlspecialchars($messages) ?></p>
                <a href="messages.php">View Messages</a>
            </div>
            
            <!-- Uncomment when ready -->
            <!-- <div class="stat-card">
                <h3>Blog Posts</h3>
                <p><?= htmlspecialchars($blogs ?? 0) ?></p>
                <a href="blog.php">Manage Blog</a>
            </div> -->
        </div>
    </main>
    
    <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>

