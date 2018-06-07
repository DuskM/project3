<?php
require_once 'config.php';
?>

      <div class="forum_irl">
        <div class="Content_1">
            <?php $query="SELECT id,date FROM topic ORDER BY date";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
                echo "bbbbbb".  $row['id'] . $row['date'];
                mysqli_close($link);
                die();

            ?>
        </div>
        <div class="Content_1">
            Content Placeholder
        </div>
        <div class="Content_1">
            Content Placeholder
        </div>
        <div class="Content_1">
            Content Placeholder
        </div>
        <div class="Content_1">
            Content Placeholder
        </div>
        <div class="Content_1">
            Content Placeholder
        </div>
      </div>
