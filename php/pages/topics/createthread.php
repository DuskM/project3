<?php
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    header("location: index.php?pag=inloggen");

    exit;

}
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST['title']))) {
        $title_err = '<span style="color:red;">Er staat niks in het veld.</span>';
    } else {
        $title = trim($_POST['title']);
    }

    if (empty(trim($_POST['description']))) {
        $description_err = '<span style="color:red;">Er staat niks in het veld.</span>';
    } else {
        $description = trim($_POST['description']);
    }
    $poster = $_SESSION['username'];
    $user_id = $_SESSION['id'];
    $topic_id = $_SESSION['topic'];


    if(empty($info_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO threads (title, description, poster, user_id, topic_id) VALUES (?,?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Variabelen binden
            mysqli_stmt_bind_param($stmt, "sssss", $param_title, $param_description, $param_poster, $param_userid, $param_topic);
            // Set parameters
            $param_title = $title;
            $param_description = $description;
            $param_poster = $poster;
            $param_userid = $user_id;
            $param_topic = $topic_id;


            if(mysqli_stmt_execute($stmt)){
                ?>
                <script type="text/javascript">
                    alert('Thread gemaakt');
                    window.location.href='index.php?pag=threads';
                </script>
                <?php

            } else{
                echo "Something went wrong. Please try again later.";
            }
        }



    }
    // connectie sluiten
    mysqli_close($link);
}

?>

<div class="profile">
    <h2>Maak nieuw thread aan.</h2>
    <script src='../javascript/ckeditor/ckeditor.js'></script>
    <script src='../javascript/functiontopic.js'></script>
    <form class="infotext2" action="index.php?pag=createthread" method="post">
        <label>Titel voor thread</label><br>
        <input type="text" id="title" name="title" class="form-control" style="background-color: rgba(20, 58, 119, 0.6)"><br>
        <label><b>Vraag/discussie onderwerp.</b></label><br>
        <textarea class='info' name='description' style='background-color: rgba(20, 58, 119, 0.6)' id='description' cols='45' rows='5'></textarea><br>
        <input type='submit' name='maak' id='maak' value='Maak thread' />
    </form>
    <script>
        CKEDITOR.replace( 'description', {
            removePlugins: 'sourcearea' });
    </script>
</div>
