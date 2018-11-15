<?php
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    header("location: index.php?pag=inloggen");

    exit;

}
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
$password = $confirm_password = "";
$password_err = $confirm_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST['password']))){
        $password_err = '<span style="color:red;">Fill in a password.</span>';
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = '<span style="color:red;">Password must contain at least 6 characters.</span>';
    } else{
        $password = trim($_POST['password']);
    }
    // wachtwoord checken
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = '<span style="color:red;">Confirm password.</span>';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = '<span style="color:red;">Passwords do not match.</span>';
        }
    }

    if(empty($password_err) && empty($confirm_password_err)){
        // Prepare an insert statement
        $sql = "UPDATE users SET password=? WHERE id ='{$_SESSION['id']}' ";
        if($stmt = mysqli_prepare($link, $sql)){
            // Variabelen binden
            mysqli_stmt_bind_param($stmt, "s", $param_password);
            // Set parameters
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash


            if(mysqli_stmt_execute($stmt)){
                ?>
                <script type="text/javascript">
                    alert('Password updated');
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
    <form class="infotext2" action="index.php?pag=pupdate" method="post">
    <div class="form-group <br><?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <br>
        <input type="password" name="password" id="password" class="form-control" style="background-color: rgba(20, 58, 119, 0.6)" value="<?php echo $password; ?>">
        <span class="help-block"><br><?php echo $password_err; ?></span>
    </div>

    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
        <label>Confirm password</label>
        <br>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" style="background-color: rgba(20, 58, 119, 0.6)" value="<?php echo $confirm_password; ?>">
        <span class="help-block"><br><?php echo $confirm_password_err; ?></span>
        <input type='submit' name='pwupdate' id='pwupdate' value='Update password' />

    </div>
    </form>
    <script>
        CKEDITOR.replace( 'info', {
            removePlugins: 'sourcearea' });
    </script>
</div>
