<?php

if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

    header("location: index.php?pag=inloggen");

    exit;

}
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
$image = "";
$image_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $image = $_FILES['image']['name'];
    if ($image != '') {
        $upload_directory = 'C:/xampp/htdocs/Forum/images/profile/';
        $TargetPath = time() . $image;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_directory . $TargetPath)) {
            $QueryInsertFile = "UPDATE users SET image ='$TargetPath' WHERE id ='{$_SESSION['id']}'";

        }
    }

    if (empty($image_err)) {
        // Prepare an insert statement
        $sql = "UPDATE users SET image=? WHERE id ='{$_SESSION['id']}' ";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Variabelen binden
            mysqli_stmt_bind_param($stmt, "s", $param_image);
            // Set parameters
            $param_image = $TargetPath;


            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['image'] = $TargetPath;
                ?>
                <script type="text/javascript">
                    alert('Profile picture updated');
                    window.location.href = 'index.php?pag=profiel';
                </script>
                <?php


            } else {
                echo ".";
            }
        }


    }
}
// connectie sluiten
mysqli_close($link);

?>
<form action="index.php?pag=imupdate" method="post" enctype="multipart/form-data">
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
    <div>
        <input type='submit' name='imupdate' id='imupdate' value='Update picture' />
    </div>
</form>


