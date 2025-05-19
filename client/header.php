<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Navbar always at the very top -->
<nav class="navbar navbar-expand-lg">
<img src="./public/gbulogo.png" alt="logo" style="width: 72px; height:auto; background:transparent; border:none; margin-right:0; margin-left:18px;"/>
  <div class="container">
    <?php if (!isset($_SESSION['user']) || !isset($_SESSION['user']['username'])): ?>
    <a class="navbar-brand d-flex align-items-end" href="./" style="align-items: flex-end; line-height:1;">
      <span style="font-weight:800; font-size:2rem; letter-spacing:1.5px; color:#fff; line-height:1;">GBUians </span>
      <span class="navbar-brand-highlight" style="font-weight:900; font-size:2.9rem; letter-spacing:0px; color:#e53935; vertical-align:baseline; line-height:1;">QUORA</span>
    </a>
    <?php endif; ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
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
      <form class="d-flex ms-3" action="">
        <input class="form-control me-2" name="search" type="search" placeholder="Search questions" style="min-width:180px;">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- No extra margin or padding above nav -->