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
        include ("pages/topics/topic.php");
        break;
    case "replies";
        include ("pages/topics/replies.php");
        break;
    case "profiel";
        include ("pages/users/profile.php");
        break;
    case "posts";
        include ("pages/users/postoverview.php");
        break;
    case "inloggen";
        include ("pages/users/login.php");
        break;
    case "registreren";
        include ("pages/users/register.php");
        break;
    case "uitloggen";
        include ("functions/uitloggen.php");
        break;
    case "iupdate";
        include ("pages/users/update/updateinfo.php");
        break;
    case "uupdate";
        include ("pages/users/update/updateuser.php");
        break;
    case "eupdate";
        include ("pages/users/update/updatemail.php");
        break;
    case "pupdate";
        include ("pages/users/update/updatepw.php");
        break;
    case "imupdate";
        include ("pages/users/update/updateimg.php");
        break;
    case "admin";
        include ("pages/users/admin.php");
        break;
    case "threads";
        include ("pages/topics/threads.php");
        break;
    case "createthread";
        include ("pages/topics/createthread.php");
        break;
    case "session";
        include ("sessions.php");
        break;
}

switch ($paggekozen){

    case "home";
        include ("pages/main.php");
        break;
    case "profiel";
        include ("pages/users/profile.php");
        break;
    case "posts";
        include ("pages/users/postoverview.php");
        break;
    case "topic";
        include ("pages/topics/topic.php");
        break;
    case "replies";
        include ("pages/topics/replies.php");
        break;
    case "inloggen";
        include ("pages/users/login.php");
        break;
    case "registreren";
        include ("pages/users/register.php");
        break;
    case "uitloggen";
        include ("functions/uitloggen.php");
        break;
    case "iupdate";
        include ("pages/users/update/updateinfo.php");
        break;
    case "uupdate";
        include ("pages/users/update/updateuser.php");
        break;
    case "eupdate";
        include ("pages/users/update/updatemail.php");
        break;
    case "pupdate";
        include ("pages/users/update/updatepw.php");
        break;
    case "imupdate";
        include ("pages/users/update/updateimg.php");
        break;
    case "admin";
        include ("pages/users/admin.php");
        break;
    case "threads";
        include ("pages/topics/threads.php");
        break;
    case "createthread";
        include ("pages/topics/createthread.php");
        break;
    case "session";
        include ("sessions.php");
        break;
    default;
        include ("pages/main.php");
        break;

}

include('C:\xampp\htdocs\Forum\html\footer.html');?>



