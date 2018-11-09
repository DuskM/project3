<?php
// functies die bijdragen aan de veiligheid

// deze php mag niet rechtstreeks worden aangeroepen, GOOD_CALL is gedefinieerd in index2.php
if (!defined('GOOD_CALL')) {
  die();
}

function f_csrf_token(){
  // maakt een security token voor formulieren om Cross-Site-Request Fraud tegen te gaan
  if(!isset($_SESSION['_token'])){
    $_SESSION['_token'] = bin2hex(random_bytes(32));
  }
  return $_SESSION['_token'];
}

function f_check_token(){
  if(hash_equals($_SESSION['_token'], $_POST['_token'])){
    unset($_SESSION['_token']);
    return true;
  }
  return false;
}