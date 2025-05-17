<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="auth-card p-4">
    <h1 class="heading" style="text-align:center;">Signup</h1>
    <form method="post" action="./server/requests.php">
      <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" name="username" class="form-control glass-input" id="username" placeholder="Enter user name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">User Email</label>
        <input type="text" name="email" class="form-control glass-input" id="email" placeholder="Enter user email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">User Password</label>
        <input type="password" name="password" class="form-control glass-input" id="password" placeholder="Enter user password">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">User Address</label>
        <input type="text" name="address" class="form-control glass-input" id="address" placeholder="Enter user address">
      </div>
      <div class="d-grid mt-4">
        <button type="submit" name="signup" class="btn btn-success glass-btn">Signup</button>
      </div>
    </form>
  </div>
</div>