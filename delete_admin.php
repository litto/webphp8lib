<?php
include("header.php");
include("session.php");
$id=base64_decode($_GET['id']);

 $config = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $config);

 $auth->deleteUserForced($id);

 header("Location:administrators.php");
 exit;
?>