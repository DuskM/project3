<?php
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
?>
<div class="page-header">
    <div class="posts">
        <h3>Threads from:</h3>


        <?php echo htmlspecialchars($_SESSION['username']); ?> <br>

        <?php $result = mysqli_query($link,"SELECT threads.id, message, date, username, created_at, thread_id, title, poster, topic_id FROM replies INNER JOIN threads ON replies.thread_id = threads.id WHERE threads.user_id = '{$_SESSION['id']}' ");?>

        <?php
        unset($_SESSION['thread']);
        unset($_SESSION['topic']);

        //echo("Error description: " . mysqli_error($link));
        while($row = mysqli_fetch_array($result)) { ?>
            <form method='post' action='index.php?pag=replies'>
                <div class="Posts_1">




                    <?php echo $row["title"]; ?><br>
                    <?php echo $row["message"]; ?><br>
                    <?php echo $row["created_at"]; ?><br>
                    <?php echo $row["poster"]; ?><br>
                    <?php //echo $row["thread_id"]; ?>
                    <?php //echo $row["topic_id"]; ?>
                    <input type='hidden' id='thread' name='thread' value='<?php echo $row["thread_id"]; ?>'/>
                    <input type='hidden' id='topic' name='topic' value='<?php echo $row["topic_id"]; ?>'/>
                    <input type='submit'/>

                </div>
            </form>
        <?php };

        ?>


        <p><a href="index.php?pag=uitloggen">Log out</a></p>
    </div>