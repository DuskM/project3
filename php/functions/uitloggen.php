<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/style_buttons.css">
<link rel="stylesheet" type="text/css" href="../../css/style_important.css">
<link rel="stylesheet" type="text/css" href="../../css/post.css">


    <style type="text/css">

        body{ font: 14px sans-serif; text-align: center; }

    </style>




<div class="page-header">

    <h3>You are logged out.</h3>

</div>

<p><a href="index.php?pag=inloggen" class="btn btn-danger">Login</a></p>

    <?php

    $_SESSION = array();

    session_destroy();

    exit;

    ?>


