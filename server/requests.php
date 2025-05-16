<?php
session_start();
include("../common/db.php");

$baseUrl = "http://localhost:8080/demoproject/";

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Securely hash password
    $address = $_POST['address'];

    // Insert new user into database
    $user = $conn->prepare("INSERT INTO `users`
        (`id`, `username`, `email`, `password`, `address`)
        VALUES (NULL, ?, ?, ?, ?)");
    $user->bind_param("ssss", $username, $email, $password, $address);
    $result = $user->execute();
    $user_id = $conn->insert_id;

    if ($result) {
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("Location: " . $baseUrl . "index.php");
        exit();
    } else {
        echo "New user not registered";
    }

} else if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Secure login with password verification
    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Debugging: Output the retrieved password hash to check if it matches the input
        // Uncomment for debugging purposes
        // echo "Stored Password: " . $row['password']; 
        // echo "Input Password: " . $password;

        if (password_verify($password, $row['password'])) {
            $_SESSION["user"] = [
                "username" => $row['username'],
                "email" => $row['email'],
                "user_id" => $row['id']
            ];
            header("Location: " . $baseUrl . "index.php");
            exit();
        } else {
            echo "Invalid login details. Password mismatch.";
        }
    } else {
        echo "Invalid login details. User not found.";
    }

} else if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $baseUrl . "index.php");
    exit();

} else if (isset($_POST["ask"])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $question = $conn->prepare("INSERT INTO `questions`
        (`id`, `title`, `description`, `category_id`, `user_id`)
        VALUES (NULL, ?, ?, ?, ?)");
    $question->bind_param("ssii", $title, $description, $category_id, $user_id);

    if ($question->execute()) {
        header("Location: " . $baseUrl . "index.php");
    } else {
        echo "Question was not added";
    }

} else if (isset($_POST["answer"])) {
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    $query = $conn->prepare("INSERT INTO `answers`
        (`id`, `answer`, `question_id`, `user_id`)
        VALUES (NULL, ?, ?, ?)");
    $query->bind_param("sii", $answer, $question_id, $user_id);

    if ($query->execute()) {
        header("Location: " . $baseUrl . "index.php?q-id=$question_id");
    } else {
        echo "Answer was not submitted";
    }

} else if (isset($_GET["delete"])) {
    $qid = $_GET["delete"];
    $query = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $query->bind_param("i", $qid);

    if ($query->execute()) {
        header("Location: " . $baseUrl . "index.php");
    } else {
        echo "Question not deleted";
    }
}
?>
