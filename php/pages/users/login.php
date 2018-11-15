<?php
//login gedeelte
// Include config file
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
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
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT email, password, username, id, image, info, created_at, birth, user_type FROM users WHERE email = ?";
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
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password, $username, $id, $image, $info, $created_at, $birth, $user_type);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['username'] = $username;
                            $_SESSION['id'] = $id;
                            $_SESSION['image'] = $image;
                            $_SESSION['info'] = $info;
                            $_SESSION['created_at'] = $created_at;
                            $_SESSION['birth'] = $birth;
                            $_SESSION['user_type'] = $user_type;
                            header("location: index.php?pag=home");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Sluit statement
        mysqli_stmt_close($stmt);
    }
    // Sluit connectie
    mysqli_close($link);

}

?>











<div class="wrapper">
    <script src="../javascript/functions.js"></script>

    <h2>Login</h2>

    <p>Fill in your login details.</p>
    <form action="index.php?pag=inloggen" method="post">
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>E-mail</label>
            <br>
            <input type="text" name="email" class="form-control" id="focus" style="background-color: rgba(20, 58, 119, 0.6)" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <br>
            <input type="password" name="password" style="background-color: rgba(20, 58, 119, 0.6)" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <p>Don't have an account yet? <a href="index.php?pag=registreren">Register</a>.</p>
        <p>Forgot password? <a href="index.php?pag=reset">Reset</a>.</p>
    </form>


</div>






