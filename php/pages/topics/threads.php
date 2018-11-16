<?php
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
require_once('C:\xampp\htdocs\Forum\php\functions\functions.php');
if($_SESSION['user_type'] == "ADMIN") {
    if (isset($_POST['topic'])) {
        $topic = $_POST['topic'];
        $_SESSION['topic'] = $topic;
        echo $_SESSION['topic'];
        echo $_SESSION['topic'];
    }
    echo "you're admin";
    if(isset($_POST['savet'])){
        $checkbox = $_POST['checkt'];
        for($i=0;$i<count($checkbox);$i++){
            $del_id = $checkbox[$i];
            mysqli_query($link,"DELETE FROM threads WHERE id='".$del_id."'");
            echo "<script type='text/javascript'>alert('Thread Removed.')</script>";
        }
    }
    $result = mysqli_query($link, "SELECT id, user_id, created_at, title, description FROM threads WHERE topic_id = '{$_SESSION['topic']}' ");

    while ($row = mysqli_fetch_array($result)) {
        unset($_SESSION['thread']);
        ?>
        <form method='post' id="threads" action='index.php?pag=threads'></form>
        <form method='post' action='index.php?pag=replies'>
            <div class="Posts_1">
                <?php $id = $row["id"]; ?>



                <?php //echo $row["id"]; ?>
                <?php //echo $row["user_id"]; ?>
                <?php echo $row["created_at"]; ?>
                <?php echo $row["title"]; ?><br>
                <?php echo $row["description"]; ?>
                <input type="checkbox" id="checkItem" name="checkt[]" form="threads" value="<?php echo $row["id"]; ?>">

                <input type='hidden' id='thread' name='thread' value='<?php echo $row["id"]; ?>'/>
                <input type='submit' value="View"/>

            </div>
            <button type="submit" class="btn btn-success" form="threads" name="savet">Delete</button>
        </form>


        <?php

    }
} else {
    if (isset($_POST['topic'])) {
        $topic = $_POST['topic'];
        $_SESSION['topic'] = $topic;
        echo $_SESSION['topic'];
    }
    $result = mysqli_query($link, "SELECT id, user_id, created_at, title, description FROM threads WHERE topic_id = '{$_SESSION['topic']}' ");

    while ($row = mysqli_fetch_array($result)) {
        unset($_SESSION['thread']);
        ?>
        <form method='post' action='index.php?pag=replies'>
            <div class="Content_1">
                <?php $id = $row["id"]; ?>



                <?php //echo $row["id"]; ?>
                <?php //echo $row["user_id"]; ?>
                <?php echo $row["created_at"]; ?>
                <?php echo $row["title"]; ?><br>
                <?php echo $row["description"]; ?>

                <input type='hidden' id='thread' name='thread' value='<?php echo $row["id"]; ?>'/>
                <input type='submit'/>

            </div>
        </form>
        <?php
    }
}
?>








<a href="index.php?pag=createthread">Create new thread</a>