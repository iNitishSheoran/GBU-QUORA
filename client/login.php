<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="auth-card p-4">
    <h1 class="heading" style="text-align:center;">Login</h1>
    <form action="./server/requests.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">User Email</label>
        <input type="text" name="email" class="form-control glass-input" id="email" placeholder="Enter user email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">User Password</label>
        <input type="password" name="password" class="form-control glass-input" id="password" placeholder="Enter user password">
      </div>
      <div class="d-grid mt-4">
        <button type="submit" name="login" class="btn btn-success glass-btn">Login</button>
      </div>
    </form>
  </div>
</div>