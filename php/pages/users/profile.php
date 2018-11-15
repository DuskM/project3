

<?php


// Initialize the session




// If session variable is not set it will redirect to login page

if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    header("location: index.php?pag=inloggen");

    exit;

}
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST['birth']))) {
        $birth_err = '<span style="color:red;">Field empty.</span>';
    } else {
        $birth = trim($_POST['birth']);
    }

if(empty($birth_err)){
        // Prepare an insert statement
        $sql = "UPDATE users SET birth=? WHERE id ='{$_SESSION['id']}' ";
        if($stmt = mysqli_prepare($link, $sql)){
            // Variabelen binden
            mysqli_stmt_bind_param($stmt, "s", $param_birth);
            // Set parameters
            $param_birth = $birth;


            if(mysqli_stmt_execute($stmt)){
                $_SESSION['birth'] = $birth;
                ?>
                <script type="text/javascript">
                    alert('Date of birth added.');
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


<div class="page-header">
    <div class="profile">
    <h3>Profile</h3>
    <br>
        <div class="picture">
            <b>Profile picture:</b> <br><img src="../images/profile/<?php echo ($_SESSION['image']); ?>" width=250 height=250
        </div>
        <br><a href="index.php?pag=imupdate">Update picture</a>

    </div>
    <p>
        <b>Username:</b> <?php echo htmlspecialchars($_SESSION['username']); ?> <br>
        <a href="index.php?pag=uupdate">Update username</a><br>
        <b>E-mail:</b> <?php echo htmlspecialchars($_SESSION['email']); ?> <br>
        <a href="index.php?pag=eupdate">Update email</a><br>
        <b>Joined on:</b> <?php echo htmlspecialchars($_SESSION['created_at']); ?> <br>
        <a href="index.php?pag=pupdate">Update password</a><br>
    </p>
    <div>


    <?php if(empty($_SESSION['info'])){ ?>
        <p><a href="index.php?pag=iupdate">Add info about yourself.</a></p>

    <?php } else{ ?>
    <b>About you</b>
    <?php echo $_SESSION['info'];
    ?> <a href="index.php?pag=iupdate">Update info</a><br>
    <?php }
    ?>
    </div>
    <p><a href="index.php?pag=posts">Posts</a></p>
    <p><a href="index.php?pag=uitloggen">Log out</a></p>
<div class="birth">
    <?php if(empty($_SESSION['birth'])){ ?>
        <form class="infotext" action="index.php?pag=profiel" method="post">
            <label><b>Date of birth</b></label><br>
            <input type="date" class='birth' name='birth' style='background-color: rgba(20, 58, 119, 0.6)' id='info' cols='45' rows='5'><br><br>
            <input type='submit' name='bupdate' id='bupdate' value='Add date of birth' />
        </form>

    <?php } else{ ?>
        <b>Date of birth</b>
        <?php echo $_SESSION['birth'];

     }
    ?>
</div>
</div>









