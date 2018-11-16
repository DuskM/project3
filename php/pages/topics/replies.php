<?php
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';




if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    echo "<p><a href='../index.php?pag=inloggen' class='btn btn-danger'>Log hier in om dit topic te kunnen zien en te reageren.</a></p>";
}
elseif($_SESSION['user_type'] == "ADMIN") {
    $mysqli = new mysqli("localhost", "root", "", "demo");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo "you are admin";
    if(isset($_POST['saver'])){
        $checkbox = $_POST['checkr'];
        for($i=0;$i<count($checkbox);$i++){
            $del_id = $checkbox[$i];
            mysqli_query($mysqli,"DELETE FROM replies WHERE id='".$del_id."'");
            echo "<script type='text/javascript'>alert('Reactie verwijderd')</script>";
        }
    }

    if (isset($_POST['thread'])) {
        $id = $_POST['thread'];
        $_SESSION['thread'] = $id;
        //echo $_SESSION['thread'];
    }
    ?><br><?php

    if (isset($_POST['topic'])) {
        $id1 = $_POST['topic'];
        $_SESSION['topic'] = $id1;
        //echo $_SESSION['topic'];
    }


    if (isset($_POST['message'])) {

        $message = $mysqli->real_escape_string($_POST['message']);
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO replies(message, date, username, user_id, thread_id) VALUES('$message','$date', '{$_SESSION['username']}', '{$_SESSION['id']}', '{$_SESSION['thread']}')";
        $mysqli->query($sql);
        $message = "Replied to thread.";

        echo "<script type='text/javascript'>alert('$message');</script>";

    }
    //echo("Error description: " . mysqli_error($link));
    $title = "SELECT title FROM topics WHERE id = '{$_SESSION['topic']}' ";
    $topictitle = $mysqli->query($title);
    $rows = $topictitle->fetch_assoc();
    echo "<h1>" . $rows['title'] . "</h1>";

    $sql = "SELECT * FROM replies WHERE thread_id = '{$_SESSION['thread']}'";


    $result = $mysqli->query($sql);
    $sql2 = "SELECT title, description FROM threads WHERE id = '{$_SESSION['thread']}' ";
    $inform = $mysqli->query($sql2);
    while ($row = $inform->fetch_assoc()) {
        echo $row['title']."<br>";
        echo $row['description']."<br>";
        echo '------------------------ <br>';
    } ?>
    <form method="post" action="index.php?pag=replies">
    <?php while ($row = $result->fetch_assoc()) {
        echo  $row['username'] . '<br>';
        echo $row['date'] . '<br>';
        echo $row['message'] . '<br>'; ?>
        <input type="checkbox" id="checkItem" name="checkr[]" value="<?php echo $row["id"]; ?>"> <?php
        echo '------------------------ <br>';
    } ?>
        <button type="submit" class="btn btn-success" name="saver">Delete</button>
    </form>
    <?php echo "Discussion about kitten food.<br>
------------------------------------------
<script src='../javascript/ckeditor/ckeditor.js'></script>
<script src='../javascript/functiontopic.js'></script>
<form method='post' action='index.php?pag=replies'>
    <p>Message: <br>
        <label for='message'></label>
        <textarea name='message' style='background-color: rgba(20, 58, 119, 0.6)' id='message' cols='45' rows='5'></textarea>
         <script>
	    CKEDITOR.replace( 'message', {
    removePlugins: 'sourcearea' });
        </script>
    </p>
    <p>
        <input type='submit' name='submit7' id='submit7' value='Reply' />
    </p>
    <input type='hidden' id='pag7' name='pag7' value='forum7'/>
</form>
<br>";
}


else {
    $mysqli = new mysqli("localhost", "root", "", "demo");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (isset($_POST['thread'])) {
    $id = $_POST['thread'];
    $_SESSION['thread'] = $id;
    //echo $_SESSION['thread'];
    }
    ?><br><?php

    if (isset($_POST['topic'])) {
        $id1 = $_POST['topic'];
        $_SESSION['topic'] = $id1;
        //echo $_SESSION['topic'];
    }






    if (isset($_POST['message'])) {

        $message = $mysqli->real_escape_string($_POST['message']);
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO replies(message, date, username, user_id, thread_id) VALUES('$message','$date', '{$_SESSION['username']}', '{$_SESSION['id']}', '{$_SESSION['thread']}')";
        $mysqli->query($sql);
        $message = "Replied to thread.";

        echo "<script type='text/javascript'>alert('$message');</script>";

    }
    //echo("Error description: " . mysqli_error($link));
    $title = "SELECT title FROM topics WHERE id = '{$_SESSION['topic']}' ";
    $topictitle = $mysqli->query($title);
    $rows = $topictitle->fetch_assoc();
    echo "<h1>" . $rows['title'] . "</h1>";

    //if (isset($_GET["replies"])) { $page  = $_GET["replies"]; } else { $page=1; };
    //$start_from = ($page-1) * $results_per_page;
    //$sql = "SELECT * FROM replies WHERE id = '{$_SESSION['thread']}' ORDER BY id ASC LIMIT $start_from, $results_per_page";
    //$result = $mysqli->query($sql);
    $sql = "SELECT * FROM replies WHERE thread_id = '{$_SESSION['thread']}'";
    $result = $mysqli->query($sql);



    $sql2 = "SELECT title, description FROM threads WHERE id = '{$_SESSION['thread']}' ";
    $inform = $mysqli->query($sql2);
    while ($row = $inform->fetch_assoc()) {
        echo $row['title']."<br>";
        echo $row['description']."<br>";
        echo '------------------------ <br>';
    }
    echo("Error description: " . mysqli_error($link));
    while ($row = $result->fetch_assoc()) {
        echo  $row['username'] . '<br>';
        echo $row['date'] . '<br>';
        echo $row['message'] . '<br>';
        echo '------------------------ <br>';
    }
    echo $row['title']."<br>
------------------------------------------
<script src='../javascript/ckeditor/ckeditor.js'></script>
<script src='../javascript/functiontopic.js'></script>
<form method='post' action='index.php?pag=replies'>
    <p>Message: <br>
        <label for='message'></label>
        <textarea name='message' style='background-color: rgba(20, 58, 119, 0.6)' id='message' cols='45' rows='5'></textarea>
         <script>
	    CKEDITOR.replace( 'message', {
    removePlugins: 'sourcearea' });
        </script>
    </p>
    <p>
        <input type='submit' name='submit7' id='submit7' value='Reply' />
    </p>
    <input type='hidden' id='pag7' name='pag7' value='forum7'/>
</form>
<br>";
//}

//$sql = "SELECT COUNT(id) AS total FROM replies";
//$result = $link->query($sql);
//$row = $result->fetch_assoc();
//$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

//for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
    //echo "<a href='index.php?page=replies".$i."'";
    //if ($i==$page)  echo " class='curPage'";
    //echo ">".$i."</a> ";
};
?>


