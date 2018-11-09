<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/style_buttons.css">
<link rel="stylesheet" type="text/css" href="../../css/style_important.css">
<link rel="stylesheet" type="text/css" href="../../css/post.css">


    <style type="text/css">

        body{ font: 14px sans-serif; text-align: center; }

    </style>




<div class="page-header">

    <h3>U bent uitgelogt.</h3>

</div>

<p><a href="index.php?pag=inloggen" class="btn btn-danger">Log in</a></p>

    <?php
    // Initialize the session
    // Unset all of the session variables
    $_SESSION = array();
    // Destroy the session.
    session_destroy();

    exit;

    ?>


