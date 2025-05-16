<!DOCTYPE html>
<html lang="en">

<head>
   <title>Discuss Project</title>
      <?php include('./client/commonFiles.php') ?>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

</head>

<body>
   <div class="overlay">
   <?php
   session_start();
   include('./client/header.php');

   // ✅ Safe session checks
   $isLoggedIn = isset($_SESSION['user']) && isset($_SESSION['user']['username']);

   if (isset($_GET['signup']) && !$isLoggedIn) {
      include('./client/signup.php');

   } else if (isset($_GET['login']) && !$isLoggedIn) {
      include('./client/login.php');

   } else if (isset($_GET['ask'])) {
      include('./client/ask.php');

   } else if (isset($_GET['q-id'])) {
      $qid = $_GET['q-id'];
      include('./client/question-details.php');

   } else if (isset($_GET['c-id'])) {
      $cid = $_GET['c-id'];
      include('./client/questions.php');

   } else if (isset($_GET['u-id'])) {
      $uid = $_GET['u-id'];
      include('./client/questions.php');

   } else if (isset($_GET['latest'])) {
      include('./client/questions.php');

   } else if (isset($_GET['search'])) {
      $search  = $_GET['search'];
      include('./client/questions.php');

   } else {
      include('./client/questions.php');
   }
   ?>
   </div>
</body>

</html>
