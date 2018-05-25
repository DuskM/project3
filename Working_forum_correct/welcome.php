

<?php


// Initialize the session

session_start();



// If session variable is not set it will redirect to login page

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

    header("location: index.php?pag=inloggen");

    exit;

}

?>




<div class="page-header">

    <h3>Personal details</h3>
    <br>
    Username: <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. <br>
    Email: <b><?php echo htmlspecialchars($_SESSION['email']); ?></b>. <br>

</div>

<p><a href="index.php?pag=update" class="btn btn-danger">Update gegevens.</a></p>
<p><a href="index.php?pag=uitloggen" class="btn btn-danger">Sign Out of Your Account</a></p>



