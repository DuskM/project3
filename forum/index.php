<?php
include("functions.php");
include("nav.php");





//bestand met functie includen
$paggekozen = paggekozen();
$paggepost = paggepost();


switch ($paggepost){
    case "home";
        include ("main.php");
        break;
    case "topic";
        include ("topic.php");
        break;
    case "forum";
        include ("forum.php");
        break;
    case "inloggen";
        include ("login.php");
        break;
    case "placeholder";
        include ("welcome.php");
        break;
    case "uitloggen";
        include ("uitloggen.php");
        break;
}

switch ($paggekozen){

    case "home";
        include ("main.php");
        break;
    case "topic";
        include ("topic.php");
        break;
    case "forum";
        include ("forum.php");
        break;
    case "inloggen";
        include ("login.php");
        break;
    case "uitloggen";
        include ("uitloggen.php");
        break;
    case "profiel";
        include ("welcome.php");
        break;
    default;
        include ("main.php");
        break;

}

include("footer.php");
?>



