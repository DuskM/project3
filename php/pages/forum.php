<?php




if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    echo "<p><a href='index.php?pag=inloggen' class='btn btn-danger'>Log hier in om te dit topic te kunnen zien en te reageren.</a></p>";
}
else {

    $mysqli = new mysqli("localhost", "root", "", "demo");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (isset($_POST['message'])) {

        $message = $mysqli->real_escape_string($_POST['message']);
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO topic(id, message, date, username) VALUES(0, '$message','$date', '{$_SESSION['username']}')";
        $mysqli->query($sql);
        $message = "Replied to topic.";

        echo "<script type='text/javascript'>alert('$message');</script>";

    }
    echo "<h2>Kittens</h2>";

    $sql = "SELECT * FROM topic";


    $result = $mysqli->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo  $row['username'] . '  ' . $row['date'] . ' <br />';
        echo $row['message'] . '<br />';
        echo '------------------------ <br />';
    }
    echo "General discussion about kittens.<br>
------------------------------------------
<script src='//cdn.ckeditor.com/4.10.0/standard/ckeditor.js'></script>
<script src='../javascript/functiontopic.js'></script>
<script>

</script>
<form method='post' action='index.php?pag=forum'>
    <p>Message: <br>
        <label for='message'></label>
        <textarea name='message' style='background-color: rgba(20, 58, 119, 0.6)' id='message' cols='45' rows='5'></textarea>
         <script>
	    CKEDITOR.replace( 'message', {
    removePlugins: 'sourcearea' });
        </script>
    </p>
    <p>
        <input type='submit' name='submit' id='submit' value='Post message' />
    </p>
    <input type='hidden' id='pag' name='pag' value='forum'/>
    
    
</form>
<br>";
}
?>


