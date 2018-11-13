<?php
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    header("location: index.php?pag=inloggen");

    exit;

}
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
$email = "";
$email_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST['email']))){
        $email_err = '<span style="color:red;">Voer een gebruikersnaam in.</span>';
    }
    else{
        $sql = "UPDATE users SET email=? WHERE id ='{$_SESSION['id']}' ";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            // Set parameters
            $param_email = trim($_POST["email"]);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = '<span style="color:red;">Dit email adres is al in gebruik.</span>';
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo '<span style="color:red;">Email adres is al in gebruik</span>';
                exit;
            }
        }
        // connectie sluiten
        mysqli_stmt_close($stmt);
    }

        if (empty($email_err)) {
            // Prepare an insert statement
            $sql = "UPDATE users SET email=? WHERE id ='{$_SESSION['id']}' ";
            if ($stmt = mysqli_prepare($link, $sql)) {
                // Variabelen binden
                mysqli_stmt_bind_param($stmt, "s", $param_email);
                // Set parameters
                $param_email = $email;


                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['email'] = $email;
                    ?>
                    <script type="text/javascript">
                        alert('Email adres geupdate');
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
    <form class="infouser" action="index.php?pag=eupdate" method="post">
        <div class="form-group <br><?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>Email adres</label>
            <br>
            <input type="text" name="email" class="form-control" style="background-color: rgba(20, 58, 119, 0.6)">
            <span class="help-block"><br><?php echo $email_err; ?></span>
        </div>
            <input type='submit' name='eupdate' id='eupdate' value='Update email adres' />
        </div>
    </form>
</div>
