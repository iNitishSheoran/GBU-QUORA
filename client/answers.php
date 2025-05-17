<div class="container d-flex justify-content-center align-items-center" style="min-height: 40vh;">
  <div class="auth-card p-4 w-100">
    <h5 class="heading" style="text-align:center; font-size:1.3rem;">Answers:</h5>
    <?php 
    $query="select * from answers where question_id=$qid";
    $result= $conn->query($query);
    foreach ($result as $row) {
        $answer= $row['answer'];
        echo "<div class='answer-row mb-3'><p class='answer-wrapper'>$answer</p></div>";
    }
    ?>
  </div>
</div>