<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="container">
   <img src="./public/untitled design2.png" alt="logo"style="width: 50px; height:auto; background-color:transparent; border:none;"/>
    <a class="navbar-brand" href="./">
     
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="./">Home</a>
        </li>

        <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="./server/requests.php?logout=true">
              Logout (<?php echo ucfirst(htmlspecialchars($_SESSION['user']['username'])) ?>)
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?ask=true">Ask A Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?u-id=<?php echo htmlspecialchars($_SESSION['user']['user_id']) ?>">My Questions</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="?login=true">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?signup=true">SignUp</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="?latest=true">Latest Questions</a>
        </li>
      </ul>
    </div>

    <form class="d-flex" action="">
      <input class="form-control me-2" name="search" type="search" placeholder="Search questions">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>