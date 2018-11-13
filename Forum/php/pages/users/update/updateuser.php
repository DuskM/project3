<?php
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    header("location: index.php?pag=inloggen");

    exit;

}
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
$username = "";
$username_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST['username']))){
        $username_err = '<span style="color:red;">Voer een gebruikersnaam in.</span>';
    }
    else{
        $sql = "UPDATE users SET username=? WHERE id ='{$_SESSION['id']}' ";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = trim($_POST["username"]);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = '<span style="color:red;">Deze gebruikersnaam is al in gebruik.</span>';
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo '<span style="color:red;">Username is al in gebruik</span>';
                exit;
            }
        }
        // connectie sluiten
        mysqli_stmt_close($stmt);
    }

        if (empty($username_err)) {
            // Prepare an insert statement
            $sql = "UPDATE users SET username=? WHERE id ='{$_SESSION['id']}' ";
            if ($stmt = mysqli_prepare($link, $sql)) {
                // Variabelen binden
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                // Set parameters
                $param_username = $username;


                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['username'] = $username;
                    ?>
                    <script type="text/javascript">
                        alert('Username geupdate');
                        window.location.href='index.php?pag=profiel';
                    </script>
                    <?php


                } else {
                    echo ".";
                }
            }


        }
        // connectie sluiten
        mysqli_close($link);

}

?>

<div class="wrapper">
    <script src='../javascript/functiontopic.js'></script>
    <form class="infouser" action="index.php?pag=uupdate" method="post">
        <div class="form-group <br><?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Gebruikersnaam</label>
            <br>
            <input type="text" name="username" class="form-control" style="background-color: rgba(20, 58, 119, 0.6)">
            <span class="help-block"><br><?php echo $username_err; ?></span>
        </div>
            <input type='submit' name='uupdate' id='uupdate' value='Update username' />
        </div>
    </form>
</div>
