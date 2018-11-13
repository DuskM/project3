<?php
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
unset($_SESSION['topic']);

$result = mysqli_query($link,"SELECT id, title, description FROM topics");

while($row = mysqli_fetch_array($result)) {
unset($_SESSION['thread']);
?>
<form method='post' action='index.php?pag=threads'>
    <div class="Content_1">
        <?php $id = $row["id"]; ?>
        <a href="index.php?pag=forum" class="fill-div">


            <?php echo $row["id"]; ?>
            <?php echo $row["title"]; ?><br>
            <?php echo $row["description"]; ?>
            <br>

            <input type='hidden' id='topic' name='topic' value='<?php echo $row["id"]; ?>'/>
            <input type='submit'/>

    </div>
</form>
<?php } ?>
<br>
<br>

