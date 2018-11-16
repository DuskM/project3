<?php
// Email and username have been chosen as a unique variable to prevent impersonation and using the same email address for different accounts.
// Only the important parts of a user account are required here, this is to make it quickly functional and avoid complexities.
// Profile picture is asked here because personally I feel it adds personality to users and they can use images to identify themselves.

require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
$username = $password = $confirm_password = $email = $image = "";
$username_err = $password_err = $confirm_password_err = $email_err = $image_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["email"]))){
        $email_err = '<span style="color:red;">Voer een email adress in.</span>';
    } else{
        $sql = "SELECT id FROM users WHERE email = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST["email"]);
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = '<span style="color:red;">This email address is already in use.</span>';
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo '<span style="color:red;">Something went wrong.</span>';
            }
        }
        mysqli_stmt_close($stmt);
    }


    if(empty(trim($_POST['username']))){
        $username_err = '<span style="color:red;">Enter a username.</span>';
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = '<span style="color:red;">This username already exists.</span>';
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo '<span style="color:red;">Er is iets fout gegaan.</span>';
            }
        }

        mysqli_stmt_close($stmt);
    }


    if(empty(trim($_POST['password']))){
        $password_err = '<span style="color:red;">Enter a valid password.</span>';
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = '<span style="color:red;">Password needs at least 6 characters.</span>';
    } else{
        $password = trim($_POST['password']);
    }
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = '<span style="color:red;">Confirm password.</span>';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = '<span style="color:red;">Passwords do not match.</span>';
        }
    }


    $image=$_FILES['image']['name'];
    if($image!='')
    {
        $upload_directory = 'C:/xampp/htdocs/Forum/images/profile/';
        $TargetPath=time().$image;
        if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_directory.$TargetPath)){
            $QueryInsertFile="INSERT INTO users SET image ='$TargetPath'";

        }
    }





    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($image_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, username, password, image) VALUES (?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_username, $param_password, $param_image);
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_username = $username;
            $param_image = $TargetPath;


            if(mysqli_stmt_execute($stmt)){
                ?><script type="text/javascript">
                    alert('Account created, you can now login.');
                    window.location.href='index.php?pag=inloggen';
                </script><?php
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }



    }
    mysqli_close($link);
}
?>
<?php

?>





<div class="wrapper">
    <script src="../javascript/functions.js"></script>
    <h2>Register</h2>
    <p>Full in these details to register.</p>
    <form action="index.php?pag=registreren" method="post" enctype="multipart/form-data">

        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>E-mail</label>
            <br>
            <input type="text" name="email" class="form-control" id="focus" style="background-color: rgba(20, 58, 119, 0.6)" value="<?php echo $email; ?>">
            <span class="help-block"><br><?php echo $email_err; ?></span></div>

        <div class="form-group <br><?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <br>
            <input type="text" name="username" class="form-control" style="background-color: rgba(20, 58, 119, 0.6)" value="<?php echo $username; ?>">
            <span class="help-block"><br><?php echo $username_err; ?></span>
        </div>

        <div class="form-group <br><?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <br>
            <input type="password" name="password" class="form-control" style="background-color: rgba(20, 58, 119, 0.6)" value="<?php echo $password; ?>">
            <span class="help-block"><br><?php echo $password_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirm password</label>
            <br>
            <input type="password" name="confirm_password" class="form-control" style="background-color: rgba(20, 58, 119, 0.6)" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><br><?php echo $confirm_password_err; ?></span>
        </div>


        <p>Upload your profile picture</p>
        <p>Image will be resized to 250x250 pixels</p>
        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
            <input type="file" id="image" name="image" accept="image/x-png,image/gif,image/jpeg" class="form-control" onchange="updateList()">
            <label class="custom-file-label" id="imagename"  for="image"></label>
        </div>
        <script>
            updateList = function() {
                var input = document.getElementById('image');
                var output = document.getElementById('imagename');

                for (var i = 0; i < input.files.length; ++i) {
                    output.innerHTML += input.files.item(i).name;
                }
            };
        </script>






        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Send">

        </div>
        <p>Already have an account? <a href="index.php?pag=inloggen">Login here</a>.</p>
    </form>

</div>


