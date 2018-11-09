<?php



include('C:\xampp\htdocs\Forum\php\functions\functions.php');

session_start();



// If session variable is not set it will redirect to login page

if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
    include('C:\xampp\htdocs\Forum\html\nav.html');
}
else {
    include('C:\xampp\htdocs\Forum\html\navlog.html');
};







//bestand met functie includen
$paggekozen = paggekozen();
$paggepost = paggepost();


switch ($paggepost){
    case "home";
        include ("pages/main.php");
        break;
    case "topic";
        include ("pages/topic.php");
        break;
    case "forum";
        include ("pages/forum.php");
        break;
    case "forum1";
        include("pages/forum1.php");
        break;
    case "forum2";
        include("pages/forum2.php");
        break;
    case "forum3";
        include("pages/forum3.php");
        break;
    case "inloggen";
        include ("pages/login.php");
        break;
    case "placeholder";
        include ("pages/profile.php");
        break;
    case "registreren";
        include ("pages/register.php");
        break;
    case "uitloggen";
        include ("functions/uitloggen.php");
        break;
    case "iupdate";
        include ("pages/updateinfo.php");
        break;
    case "uupdate";
        include ("pages/updateuser.php");
        break;
    case "eupdate";
        include ("pages/updatemail.php");
        break;
    case "pupdate";
        include ("pages/updatepw.php");
        break;
    case "imupdate";
        include ("pages/updateimg.php");
        break;
    case "admin";
        include ("pages/admin.php");
        break;
}

switch ($paggekozen){

    case "home";
        include ("pages/main.php");
        break;
    case "topic";
        include ("pages/topic.php");
        break;
    case "forum";
        include ("pages/forum.php");
        break;
    case "forum1";
        include("pages/forum1.php");
        break;
    case "forum2";
        include("pages/forum2.php");
        break;
    case "forum3";
        include("pages/forum3.php");
        break;
    case "inloggen";
        include ("pages/login.php");
        break;
    case "uitloggen";
        include ("functions/uitloggen.php");
        break;
    case "profiel";
        include ("pages/profile.php");
        break;
    case "registreren";
        include ("pages/register.php");
        break;
    case "iupdate";
        include ("pages/updateinfo.php");
        break;
    case "uupdate";
        include ("pages/updateuser.php");
        break;
    case "eupdate";
        include ("pages/updatemail.php");
        break;
    case "pupdate";
        include ("pages/updatepw.php");
        break;
    case "imupdate";
        include ("pages/updateimg.php");
        break;
    case "admin";
        include ("pages/admin.php");
        break;
    default;
        include ("pages/main.php");
        break;

}

include('C:\xampp\htdocs\Forum\html\footer.html');?>



