<?php
$config = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $config);

if (!$auth->isLogged()) {

 $msg="Forbidden Access..Login to Continue..";;
 $message    =   new Message($msg,'error');
 $message->setMessage();
   header("Location:login.php");
    exit();
}

?>