<div class="container">
    <h1 class="heading">Question</h1>
    <div class="row question-details-row">
        <div class="col-8">
            <?php
            include("./common/db.php");
            $query = "select * from questions where id =$qid";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $cid = $row['category_id'];
            echo "<h4 class='margin-bottom-15 question-title'>Question : " . $row['title'] . "</h4>
    <p class='margin-bottom-15'>" . $row['description'] . "</p>";
            ?>
            <div class="row">
                <div class="col-12">
                    <?php include("answers.php"); ?>
                    <form action="./server/requests.php" method="post">
                        <input type="hidden" name="question_id" value="<?php echo $qid ?>">
                        <textarea name="answer" class="form-control glass-input margin-bottom-15" placeholder="Your answer..."></textarea>
                        <button class="btn btn-success glass-btn">Write your answer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="more-category-questions">
            <?php
            $categoryQuery = "select name from category where id=$cid";
            $categoryResult = $conn->query($categoryQuery);
            $categoryRow = $categoryResult->fetch_assoc();
            echo "<h2 class='category-heading' style='text-align:center;'>" . ucfirst($categoryRow['name']) . "</h2>";
            echo "<div class='category-list-grid'>";
            echo "<div style='text-align:center; color:#fff; font-weight:600; margin-bottom:10px; font-size:1.1rem;'>More in this Category</div>";
            $query = "select * from questions where category_id=$cid and id!=$qid";
            $result = $conn->query($query);
            foreach ($result as $row) {
                $id = $row['id'];
                $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                echo "<div class='category-list-item'><a href=?q-id=$id>$title</a></div>";
            }
            echo "</div>";
            ?>
        </div>
    </div>
</div>