<?php
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
?>
<div class="page-header">
    <div class="profile">
    <h3>Posts van:</h3>


        <?php echo htmlspecialchars($_SESSION['username']); ?> <br>

    <?php $result = mysqli_query($link,"SELECT replies.id, message, date, username, created_at, thread_id, title, poster, topic_id FROM replies INNER JOIN threads ON replies.thread_id = threads.id WHERE replies.user_id = '{$_SESSION['id']}' ");?>

            <?php
            unset($_SESSION['thread']);
            unset($_SESSION['topic']);

            //echo("Error description: " . mysqli_error($link));
            while($row = mysqli_fetch_array($result)) { ?>
        <form method='post' action='index.php?pag=replies'>
            <div class="Content_1"> <?php




                     echo $row["title"];
                     echo $row["message"];
                     echo $row["created_at"];
                     echo $row["poster"];
                     echo $row["thread_id"];
                     echo $row["topic_id"]; ?>
                    <input type='hidden' id='thread' name='thread' value='<?php echo $row["thread_id"]; ?>'/>
                    <input type='hidden' id='topic' name='topic' value='<?php echo $row["topic_id"]; ?>'/>
                    <input type='submit'/>

            </div>
        </form>
                <?php };

            ?>


        <p><a href="index.php?pag=uitloggen">Uitloggen</a></p>
    </div>