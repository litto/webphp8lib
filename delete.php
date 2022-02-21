<?php
include("header.php");
include("session.php");
$id=base64_decode($_GET['id']);
 $user = new User();
 //$user->fetchById($id);
 //$user->delete();

 $user->deleterecord($id);

 header("Location:users.php");
 exit;
?>