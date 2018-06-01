<?php

session_start();

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

    echo "<p><a href='index.php?pag=inloggen' class='btn btn-danger'>Log hier in om te dit topic te kunnen zien en te reageren.</a></p>";
}
else {

    $mysqli = new mysqli("localhost", "root", "", "demo");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (isset($_GET['message'])) {

        $message = $mysqli->real_escape_string($_GET['message']);
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO topic(message, date) VALUES('$message','$date')";
        $mysqli->query($sql);
    }
    echo "<h2>Kittens</h2>";

    $sql = "SELECT * FROM topic";


    $result = $mysqli->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo  htmlspecialchars($_SESSION['username']) . ',  ' . $row['date'] . ' <br />';
        echo $row['message'] . '<br />';
        echo '------------------------ <br />';
    }
    echo "General discussion about kittens.<br>
------------------------------------------

<form method='get' action='index.php?pag=forum'>
    <p>Message: <br>
        <label for='message'></label>
        <textarea name='message' style='background-color: rgba(20, 58, 119, 0.6)'' id='message' cols='45' rows='5'></textarea>
    </p>
    <p>
        <input type='submit' name='submit' id='submit' value='Post message' />
    </p>
</form>
<br>";
}
?>


