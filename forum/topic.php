<?php
require_once 'config.php';
?>

      <div class="forum_irl">
        <div class="Content_1">
            <a href="index.php?pag=forum" class="fill-div">
            Title: Kittens <br><br>
                Last post:
            <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
                echo $row['username'] . "<br>" . $row['date'];
            ?>
        </div>
        <div class="Content_1">
            <a href="index.php?pag=forum" class="fill-div">
                Title: Food <br><br>
                Last post:
                <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                echo $row['username'] . "<br>" . $row['date'];
                ?>
        </div>
        <div class="Content_1">
            <a href="index.php?pag=forum" class="fill-div">
                Title: Gifs <br><br>
                Last post:
                <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                echo $row['username'] . "<br>" . $row['date'];
                ?>
        </div>
        <div class="Content_1">
            <a href="index.php?pag=forum" class="fill-div">
                Title: Images <br><br>
                Last post:
                <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                echo $row['username'] . "<br>" . $row['date'];
                ?>
        </div>
        <div class="Content_1">
            <a href="index.php?pag=forum" class="fill-div">
                Title: General <br><br>
                Last post:
                <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                echo $row['username'] . "<br>" . $row['date'];
                ?>
        </div>
        <div class="Content_1">
            <a href="index.php?pag=forum" class="fill-div">
                Title: Off topic <br><br>
                Last post:
                <?php $query="SELECT username,date FROM topic ORDER BY date DESC";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);
                echo $row['username'] . "<br>" . $row['date'];
                mysqli_close($link);
                ?>
        </div>
      </div>
