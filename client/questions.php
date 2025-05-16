<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="heading">Questions</h1>
            <?php
            include("./common/db.php");

            // Get and sanitize URL parameters
            $cid = isset($_GET["c-id"]) ? intval($_GET["c-id"]) : null;
            $uid = isset($_GET["u-id"]) ? intval($_GET["u-id"]) : null;
            $search = isset($_GET["search"]) ? $conn->real_escape_string($_GET["search"]) : null;

            // Build query
            if ($cid) {
                $query = "SELECT * FROM questions WHERE category_id = $cid";
            } else if ($uid) {
                $query = "SELECT * FROM questions WHERE user_id = $uid";
            } else if (isset($_GET["latest"])) {
                $query = "SELECT * FROM questions ORDER BY id DESC";
            } else if ($search) {
                $query = "SELECT * FROM questions WHERE `title` LIKE '%$search%'";
            } else {
                $query = "SELECT * FROM questions";
            }

            // Execute query
            $result = $conn->query($query);

            // Display each question
            foreach ($result as $row) {
                $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                $id = $row['id'];
                $ownerId = $row['user_id'];

                echo "<div class='row question-list'>";
                echo "<h4 class='my-question'><a href='?q-id=$id'>$title</a>";

                // Show delete link only if "u-id" matches the question's user_id
                if ($uid && $uid == $ownerId) {
                    echo " <a href='./server/requests.php?delete=$id' class='btn btn-sm btn-danger ms-2' onclick=\"return confirm('Are you sure you want to delete this question?');\">Delete</a>";
                }

                echo "</h4></div>";
            }
            ?>
        </div>

        <div class="col-4">
            <?php include('categorylist.php'); ?>
        </div>
    </div>
</div>
