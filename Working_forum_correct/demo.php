<?php
include ("functions.php");

if(isset($_GET['pag'])){
    switch($_GET['pag']){
        case 1:
            echo json_encode("pagina 1 gekoen");
            break;
        case 2:
            echo json_encode("Dit is pagina 2");
    }
    die();
}

