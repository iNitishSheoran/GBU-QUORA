<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="heading mb-0">Questions</h1>
                <!-- Category Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="index.php">All</a></li>
                        <?php 
                        include('./common/db.php');
                        $query="select * from category";
                        $result = $conn->query($query);
                        foreach($result as $row){
                            $name=  ucfirst($row['name']);
                            $id= $row['id'];
                            echo "<li><a class='dropdown-item' href='?c-id=$id'>$name</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-8">
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
            if ($result && $result->num_rows > 0) {
                foreach ($result as $row) {
                    $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                    $id = $row['id'];
                    $ownerId = $row['user_id'];
                    $created = isset($row['created_at']) ? date('M d, Y', strtotime($row['created_at'])) : '';

                    echo "<div class='question-list'>";
                    echo "<div>";
                    echo "<h4 class='my-question mb-1'><a href='?q-id=$id'>" . $title . "</a></h4>";
                    if ($created) {
                        echo "<div style='font-size:0.95em; color:#888;'>Asked on $created</div>";
                    }
                    echo "</div>";

                    // Show delete link only if "u-id" matches the question's user_id
                    if ($uid && $uid == $ownerId) {
                        echo "<a href='./server/requests.php?delete=$id' class='btn btn-sm btn-danger ms-2' onclick=\"return confirm('Are you sure you want to delete this question?');\">Delete</a>";
                    }

                    echo "</div>";
                }
            } else {
                echo "<div class='question-list'><em>No questions found.</em></div>";
            }
            ?>
        </div>
        <!-- No duplicate heading in the right column -->
        <div class="col-4 d-none d-lg-block"></div>
    </div>
</div>
<!-- Containers are now transparent and blend with overlay -->
