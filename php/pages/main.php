<?php
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){ ?>

    <p><a href='index.php?pag=inloggen' class='btn btn-danger'>Inloggen</a></p>
<?php }
elseif($_SESSION['user_type'] == "ADMIN") { ?>
    <div class='page-header'>
      <div class='idk'>
        ADMIN, <?php echo htmlspecialchars($_SESSION['username']); ?> <br><br>

          Welcome.
          <br><a href="index.php?pag=admin">Secret Admin page</a>


    </div>
    </div>
<?php }
    else { ?>
    <div class='page-header'>
      <div class='idk'>
        Hi, <?php echo htmlspecialchars($_SESSION['username']); ?> <br><br>

          Welcome.


    </div>
    </div> <?php
};

require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';



$result = mysqli_query($link, "SELECT replies.id, username, replies.user_id, created_at, title, description, poster, message, thread_id, topic_id FROM replies INNER JOIN threads ON replies.thread_id = threads.id ORDER BY date DESC LIMIT 5");
        //echo("Error description: " . mysqli_error($link));
        echo "Recent posts";
while ($row = mysqli_fetch_array($result)) {
unset($_SESSION['thread']);
unset($_SESSION['topic']);
?>
<form method='post' action='index.php?pag=replies'>
        <div class="Content_1">
        <?php $id = $row["id"]; ?>



        <?php echo "Last post by: " . $row["username"]; ?><br>
        <?php echo "In: " . $row["title"]; ?><br>
        <?php echo $row["description"]; ?><br>
        <?php echo "Reply: " . $row["message"]; ?><br>

        <input type='hidden' id='thread' name='thread' value='<?php echo $row["thread_id"]; ?>'/>
        <input type='hidden' id='topic' name='topic' value='<?php echo $row["topic_id"]; ?>'/>
        <input type='submit' value='View'/>

    </div>
</form>
<?php
    }; ?>
        <br>
        <br>

