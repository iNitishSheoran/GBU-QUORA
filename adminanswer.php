<?php
// adminanswer.php: Handles storing admin contest answers in the database and returns a thank you message
session_start();
include_once('./common/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_answer'])) {
    $answer = trim($_POST['admin_answer']);
    $username = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : 'Guest';
    $ip = $_SERVER['REMOTE_ADDR'];
    $created_at = date('Y-m-d H:i:s');

    if ($answer !== '') {
        // Create table if not exists
        $createTable = "CREATE TABLE IF NOT EXISTS admin_answers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100),
            answer TEXT NOT NULL,
            ip VARCHAR(45),
            created_at DATETIME
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        mysqli_query($conn, $createTable);

        // Insert answer
        $stmt = $conn->prepare("INSERT INTO admin_answers (username, answer, ip, created_at) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $username, $answer, $ip, $created_at);
        $stmt->execute();
        $stmt->close();
        // Redirect to avoid form resubmission on refresh (Post/Redirect/Get pattern)
        header('Location: index.php?contest=thanks');
        exit;
    }
}
// If not POST or empty, show error
http_response_code(400);
echo '<div style="color:#e53935;font-weight:600;font-size:1.12em;margin-top:12px;">Please enter a valid answer.</div>';
