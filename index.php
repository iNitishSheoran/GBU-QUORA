<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>GBUians QUORA</title>

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
            <!-- Category/Link to Footer -->
            <div class="category-section" style="position:relative;margin:32px auto 0 auto;max-width:420px;background:rgba(255,255,255,0.13);backdrop-filter:blur(8px);border-radius:18px;padding:18px 28px 14px 28px;box-shadow:0 4px 24px 0 rgba(0,0,0,0.10);font-family:\'Poppins\',sans-serif;text-align:center;overflow:hidden;">
               <img src="./public/amazonvoucher.jpg" alt="Amazon Voucher" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;opacity:0.32;z-index:0;border-radius:18px;pointer-events:none;filter:brightness(0.92) blur(2px);" loading="lazy" />
               <div style="position:relative;z-index:1;">
                  <div style="font-size:1.18em;font-weight:700;color:#e53935;text-shadow:0 2px 8px rgba(0,0,0,0.22);margin-bottom:6px;">Admin of GBU Quora</div>
                  <div style="font-size:1.01em;color:#fff;text-shadow:0 1.5px 6px rgba(0,0,0,0.32);margin-bottom:10px;">Guess the admin quora and lucky one may get the chance to win an Amazon voucher</div>
                  <a href="#footer" style="display:inline-block;padding:8px 22px;font-size:1.05em;font-weight:500;color:#fff;background:linear-gradient(90deg,#00f2a6 0%,#e53935 100%);border:none;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.10);text-decoration:none;transition:background 0.2s,transform 0.2s;">Go to Contest <span style="font-size:1.2em;vertical-align:middle;">&#8595;</span></a>
               </div>
            </div>
            <!-- End Category/Link to Footer -->
            <!-- Dramatic animated image 2: parallax, left side, blurred glass reflection -->
            
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
            <h1>Welcome to the <span class="navbar-brand-highlight" style="font-weight:800; font-size:2rem; letter-spacing:1.5px; color:#e53935;">GBUians QUORA</span> </h1>
            <p>Your Unofficial Student HQ</p
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
   <footer id="footer" class="site-footer" style="width:100%;background:rgba(34,34,34,0.95);color:#fff;padding:24px 0 12px 0;text-align:center;font-family:'Montserrat','Poppins',sans-serif;font-size:1.08rem;letter-spacing:0.5px;box-shadow:0 -2px 18px rgba(0,184,148,0.10);margin-top:48px;position:relative;">
      <div style="max-width:1200px;margin:auto;display:flex;align-items:center;justify-content:center;gap:28px;flex-wrap:wrap;"> <!-- changed justify-content:flex-start to center -->
         <div style="text-align:center;"> <!-- changed text-align:left to center -->
            <span style="color:#00f2a6;font-weight:700;">GBUians QUORA</span> &copy; <?php echo date('Y'); ?> Made by  ~ <span style="color:#fff;font-size:1.2em;">&#10084;</span> for the GBU community.<br>
            <span style="font-size:0.98em;color:#aaa;">Not affiliated with GBU. For students, by students.</span><br>
            <span style="display:inline-block;margin-top:8px;font-size:1.08em;color:#fff;">Guess the admin of Q &amp; A discussion group and win the chance to get an Amazon voucher!
               <img src="./public/amazonvoucher.jpg" alt="Amazon Voucher" style="vertical-align:middle;margin-left:12px;height:48px;border-radius:12px;box-shadow:0 4px 24px 0 rgba(0,0,0,0.18),0 1.5px 8px 0 rgba(255,193,7,0.12);border:2.5px solid #fff;object-fit:cover;transition:transform 0.2s;transform:rotate(-3deg);background:#fff;" loading="lazy" />
            </span>
            <div style="display:flex;align-items:center;justify-content:center;margin-top:22px;gap:18px;flex-wrap:wrap;"> <!-- changed justify-content:flex-start to center -->
               <span style="font-size:1.08em;color:#fff;font-weight:600;display:flex;align-items:center;gap:6px;">
                   Click here to answer
                  <span style="color:#ff5722;font-size:1.25em;">&#128293;</span> <!-- fire emoji -->
                  <span style="font-size:1.35em;">&#128073;</span> <!-- hand pointing right emoji -->
               </span>
               <div id="admin-answer-section">
                  <button id="show-admin-answer" style="padding:8px 22px;font-size:1.05em;font-weight:600;color:#fff;background:linear-gradient(90deg,#e53935 0%,#00f2a6 100%);border:none;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.10);cursor:pointer;transition:background 0.2s,transform 0.2s;">Admin of GBU Quora</button>
                  <form id="admin-answer-form" style="display:none;margin-top:14px;" method="post" action="adminanswer.php" autocomplete="off">
                     <input type="text" name="admin_answer" placeholder="Your answer..." style="padding:8px 14px;border-radius:7px;border:1.5px solid #00f2a6;font-size:1em;width:220px;max-width:90%;margin-right:8px;outline:none;" required />
                     <button type="submit" style="padding:8px 18px;font-size:1em;font-weight:600;color:#fff;background:linear-gradient(90deg,#00f2a6 0%,#e53935 100%);border:none;border-radius:7px;box-shadow:0 2px 8px rgba(0,0,0,0.10);cursor:pointer;">Submit</button>
                  </form>
                  <div id="admin-answer-thankyou" style="display:none;color:#00f2a6;font-weight:600;font-size:1.12em;margin-top:12px;">Thank you for your answer! 🎉</div>
               </div>
            </div>
         </div>
      </div>
      <script>
      document.getElementById('show-admin-answer').onclick = function(e) {
         e.preventDefault();
         var form = document.getElementById('admin-answer-form');
         form.style.display = 'block';
         document.querySelector('input[name="admin_answer"]').focus();
      };
      document.getElementById('admin-answer-form').onsubmit = function(e) {
         e.preventDefault();
         var form = this;
         var thankyou = document.getElementById('admin-answer-thankyou');
         var data = new FormData(form);
         var xhr = new XMLHttpRequest();
         xhr.open('POST', form.action, true);
         xhr.onload = function() {
            if (xhr.status === 200) {
               form.style.display = 'none';
               thankyou.style.display = 'block';
            } else {
               thankyou.style.display = 'block';
               thankyou.style.color = '#e53935';
               thankyou.innerHTML = 'Please enter a valid answer.';
            }
         };
         xhr.send(data);
      };
      </script>
   </footer>
</body>
</html>
