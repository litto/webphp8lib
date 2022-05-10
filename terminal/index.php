<?php
include("header.php");
include("session.php");
use Lablnet\Encryption;
use Rakit\Validation\Validator;
use Ausi\SlugGenerator\SlugGenerator;
use EasyCSRF\Exceptions\InvalidCsrfTokenException;
?>
<div class="container">

  <div class="row">
<?php include("sidebar.php");  ?>
 
 <div class="col-md-8"> 

<h3> Welcome Home </h3>
<?php

$loggeduserdetails=$auth->getCurrentUser();
print_r($loggeduserdetails);
?>

  </div>




</div>
</div>
<?php include("footer.php"); ?>

