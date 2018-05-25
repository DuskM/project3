<?php


function paggepost ()
{
    if(isset($_POST['pag'])) {
      return $_POST['pag'];
    } else {
        return "";
    }
}

function paggekozen ()
{
    if(isset($_GET['pag'])) {
        return $_GET['pag'];
    } else {
        return "";
    }
}

