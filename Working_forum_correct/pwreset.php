<?php
// Include config file
require_once 'config.php';
// Define variables and initialize with empty values
$email = $password = $username = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = 'Voer een email adress in.';
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your new password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT email, password, username FROM users WHERE email = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            // Set parameters
            $param_email = $email;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // wachtwoord checken
                    if(empty(trim($_POST['password']))){
                        $password_err = '<span style="color:red;">Voer een wachtwoord in.</span>';
                    } elseif(strlen(trim($_POST['password'])) < 6){
                        $password_err = '<span style="color:red;">Wachtwoord moet minstens 6 tekens hebben.</span>';
                    } else{
                        $password = trim($_POST['password']);
                    }
                    // wachtwoord checken
                    if(empty(trim($_POST["confirm_password"]))){
                        $confirm_password_err = '<span style="color:red;">Bevestig het wachtwoord.</span>';
                    } else{
                        $confirm_password = trim($_POST['confirm_password']);
                        if($password != $confirm_password){
                            $confirm_password_err = '<span style="color:red;">Wachtwoord komt niet overeen.</span>';
                        }
                    }




                    // Check input
                    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) &&empty($email_err)){
                        // Prepare an insert statement
                        $sql = "UPDATE users (password) VALUES (?, ?, ?) WHERE ";
                        if($stmt = mysqli_prepare($link, $sql)){
                            // Variabelen binden
                            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_username, $param_password);
                            // Set parameters
                            $param_email = $email;
                            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                            $param_username = $username;


                            if(mysqli_stmt_execute($stmt)){
                                // Naar login pagina sturen
                                header("location: index.php?pag=5");
                            } else{
                                echo "Something went wrong. Please try again later.";
                            }
                        }



                    }
                    // connectie sluiten
                    mysqli_close($link);
                }

?>





<style type="text/css">

    body{ font: 14px sans-serif; }

    .wrapper{ width: 350px; padding: 20px; }

</style>





<div class="wrapper">

    <h2>Login</h2>

    <p>Vul je login gegevens in.</p>
    <form action="index.php?pag=inloggen" method="post">
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>E-mail</label>
            <br>
            <input type="text" name="email" class="form-control" style="background-color: rgba(20, 58, 119, 0.6)" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Wachtwoord</label>
            <br>
            <input type="password" name="password" style="background-color: rgba(20, 58, 119, 0.6)" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <p>Heb je geen account? <a href="index.php?pag=registreren">Registreren</a>.</p>
    </form>
</div>