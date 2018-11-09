<?php

// Include functions
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
$username = $password = $confirm_password = $email = $image = "";
$username_err = $password_err = $confirm_password_err = $email_err = $image_err = "";

// checks
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // email checken.
    if(empty(trim($_POST["email"]))){
        $email_err = '<span style="color:red;">Voer een email adress in.</span>';
    } else{
        // Select statement
        $sql = "SELECT id FROM users WHERE email = ?";
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
                    $email_err = '<span style="color:red;">Dit Email adres is al in gebruik.</span>';
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo '<span style="color:red;">Er is iets fout gegaan.</span>';
            }
        }
        // connectie sluiten
        mysqli_stmt_close($stmt);
    }

    // username checken
    if(empty(trim($_POST['username']))){
        $username_err = '<span style="color:red;">Voer een gebruikersnaam in.</span>';
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
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
                    $email_err = '<span style="color:red;">Deze gebruikersnaam is al in gebruik.</span>';
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo '<span style="color:red;">Er is iets fout gegaan.</span>';
            }
        }
        // connectie sluiten
        mysqli_stmt_close($stmt);
    }

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

    $image=$_FILES['image']['name'];
    if($image!='')
    {
        $upload_directory = 'C:\xampp\htdocs\Forum\images\profile';
        $TargetPath=time().$image;
        if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_directory.$TargetPath)){
            $QueryInsertFile="INSERT INTO users SET image ='$TargetPath'";

        }
    }




    // Check input
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($image_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, username, password, image) VALUES (?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Variabelen binden
            mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_username, $param_password, $param_image);
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_username = $username;
            $param_image = $image;


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