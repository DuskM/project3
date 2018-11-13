<?php
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
require_once('C:\xampp\htdocs\Forum\php\functions\functions.php');
if (isset($_POST['topic'])) {
    $topic = $_POST['topic'];
    $_SESSION['topic'] = $topic;
    echo $_SESSION['topic'];
}
$result = mysqli_query($link,"SELECT id, user_id, created_at, title, description FROM tactics WHERE topic_id = '{$_SESSION['topic']}' ");

while($row = mysqli_fetch_array($result)) {
    unset($_SESSION['thread']);
    ?>
<form method='post' action='index.php?pag=forum'>
    <div class="Content_1">
        <?php $id = $row["id"]; ?>
        <a href="index.php?pag=forum" class="fill-div">


        <?php echo $row["id"]; ?>
        <?php echo $row["user_id"]; ?>
        <?php echo $row["created_at"]; ?>
        <?php echo $row["title"]; ?><br>
        <?php echo $row["description"]; ?>

                <input type='hidden' id='thread' name='thread' value='<?php echo $row["id"]; ?>'/>
                <input type='submit'/>

    </div>
</form>
<?php

}?>








<a href="index.php?pag=tacticthread">Maak nieuwe thread</a>