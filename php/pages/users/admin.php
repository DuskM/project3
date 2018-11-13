<?php
require_once 'C:\xampp\htdocs\Forum\php\functions\config.php';
if($_SESSION['user_type'] == "ADMIN") {






    require_once('C:\xampp\htdocs\Forum\php\functions\functions.php');


    if(isset($_POST['save'])){
        $checkbox = $_POST['check'];
        for($i=0;$i<count($checkbox);$i++){
            $del_id = $checkbox[$i];
            mysqli_query($link,"DELETE FROM users WHERE id='".$del_id."'");
            $message = "Data deleted successfully !";
        }
    }
    $result = mysqli_query($link,"SELECT id, username, email, birth, created_at FROM users");
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Delete employee data</title>
    </head>
    <body>
    <div><?php if(isset($message)) { echo $message; } ?>
    </div>
    <form method="post" action="index.php?pag=admin">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><input type="checkbox" id="checkAl"> Select All</th>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Birth</th>
                <th>Created at</th>
            </tr>
            </thead>
            <?php
            $i=0;
            while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id"]; ?>"></td>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["birth"]; ?></td>
                    <td><?php echo $row["created_at"]; ?></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
        <p align="center"><button type="submit" class="btn btn-success" name="save">DELETE</button></p>
    </form>
    <script>
        $("#checkAl").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
    <?php
}
else { ?>
        <p>GET OUT OF MY SWAMP</p><?php

};

?>