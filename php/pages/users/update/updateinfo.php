<?php
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    header("location: index.php?pag=inloggen");

    exit;

}
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST['info']))) {
        $info_err = '<span style="color:red;">The field is empty.</span>';
    } else {
        $info = trim($_POST['info']);
    }

    if(empty($info_err)){
        // Prepare an insert statement
        $sql = "UPDATE users SET info=? WHERE id ='{$_SESSION['id']}' ";
        if($stmt = mysqli_prepare($link, $sql)){
            // Variabelen binden
            mysqli_stmt_bind_param($stmt, "s", $param_info);
            // Set parameters
            $param_info = $info;


            if(mysqli_stmt_execute($stmt)){
                $_SESSION['info'] = $info;
                ?>
                <script type="text/javascript">
                    alert('Info updated');
                    window.location.href='index.php?pag=profiel';
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
        <script src='../javascript/ckeditor/ckeditor.js'></script>
        <script src='../javascript/functiontopic.js'></script>
        <form class="infotext2" action="index.php?pag=iupdate" method="post">
            <label><b>Info about you</b></label><br>
            <textarea class='info' name='info' style='background-color: rgba(20, 58, 119, 0.6)' id='info' cols='45' rows='5'></textarea><br>
            <input type='submit' name='update' id='update' value='Update info' />
        </form>
        <script>
            CKEDITOR.replace( 'info', {
                removePlugins: 'sourcearea' });
        </script>
    </div>
