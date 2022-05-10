<?php
include("header.php");
include("session.php");
use Lablnet\Encryption;
use Rakit\Validation\Validator;
use Ausi\SlugGenerator\SlugGenerator;
use EasyCSRF\Exceptions\InvalidCsrfTokenException;

$loggeduserdetails=$auth->getCurrentUser();
$userid=$loggeduserdetails['id'];
$auth->logoutAll($userid);
 header("Location:login.php");
    exit();

?>