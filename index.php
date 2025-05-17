<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Discuss Project</title>

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

   <!-- Common CSS/JS -->
   <?php include('./client/commonFiles.php') ?>

   <!-- Custom Styling -->
   <link rel="stylesheet" href="./public/style.css">
</head>

<body>
   <div class="overlay">
      <?php
      session_start();
      include('./client/header.php'); // ✅ Keep this only — remove extra navbar

      $isLoggedIn = isset($_SESSION['user']) && isset($_SESSION['user']['username']);
      $isHome = !isset($_GET['signup']) && !isset($_GET['login']) && !isset($_GET['ask']) && !isset($_GET['q-id']) && !isset($_GET['c-id']) && !isset($_GET['u-id']) && !isset($_GET['latest']) && !isset($_GET['search']);

      echo '<div class="overlay">';

      if ($isHome) {
         echo '<div class="welcome-banner">
            <!-- Animated gradient orbs -->
            <div class="animated-orb orb1"></div>
            <div class="animated-orb orb2"></div>
            <div class="animated-orb orb3"></div>
            <div class="animated-orb orb4"></div>
            <div class="animated-orb orb5"></div>
            <!-- Dramatic animated image 1: floating, right side -->
            <img src="./public/img1.jpg" alt="Welcome" class="banner-image-animated" loading="lazy" />
            <!-- Dramatic animated image 2: parallax, left side, blurred glass reflection -->
            <div class="banner-image-parallax-wrapper">
               <img src="./public/img2.jpg" alt="Inspiration" class="banner-image-parallax" loading="lazy" />
            </div>
            <!-- Animated SVG waves at the bottom -->
            <div class="animated-waves">
               <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
                  <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#00f2a6" fill-opacity="0.18">
                     <animate attributeName="d" dur="6s" repeatCount="indefinite"
                        values="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z;
                                M0,30 C400,60 1040,20 1440,30 L1440,80 L0,80 Z;
                                M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" />
                  </path>
               </svg>
            </div>
            <h1>Welcome to the Discussion Group</h1>
            <p                    Share, learn, and grow together. Ask questions, find answers, and connect with your college.</p
         </div>';
      }

      echo '<div class="content-wrapper">';
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
      echo '</div>';
      ?>
   </div>
</body>
</html>
