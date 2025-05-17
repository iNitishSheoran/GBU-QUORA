<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="auth-card p-4">
    <h1 class="heading" style="text-align:center;">Ask A Question</h1>
    <form action="/demoproject/server/requests.php" method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control glass-input" id="title" placeholder="Enter question">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control glass-input" id="description" placeholder="Enter question"></textarea>
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <?php include("category.php"); ?>
      </div>
      <div class="d-grid mt-4">
        <button type="submit" name="ask" class="btn btn-success glass-btn">Ask Question</button>
      </div>
    </form>
  </div>
</div>