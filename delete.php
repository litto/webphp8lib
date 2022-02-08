<?php
include("header.php");

$id=base64_decode($_GET['id']);
 $user = new User();
 //$user->fetchById($id);
 //$user->delete();

 $user->deleterecord($id);

 header("Location:index.php");
 exit;
?>