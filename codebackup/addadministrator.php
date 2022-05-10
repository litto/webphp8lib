<?php
include("header.php");
include("session.php");
use Lablnet\Encryption;
use Rakit\Validation\Validator;
use Ausi\SlugGenerator\SlugGenerator;
use EasyCSRF\Exceptions\InvalidCsrfTokenException;
//Insert

if(isset($_POST['submit'])){

$sessionProvider = new EasyCSRF\NativeSessionProvider();
$easyCSRF = new EasyCSRF\EasyCSRF($sessionProvider);
try {
    $easyCSRF->check('my_token', $_POST['token']);
} catch(InvalidCsrfTokenException $e) {
   $errormsg= $e->getMessage();
     $message  =   new Message($errormsg,'error');
    $message->setMessage();
header("Location:addadministrator.php");
exit;
}

$validator = new Validator;
// make it
$validation = $validator->make($_POST + $_FILES, [
    'email'                 => 'required|email',
    'password'              => 'required|min:6',
    'cpassword'             => 'required|min:6',
]);

// then validate
$validation->validate();

if ($validation->fails()) {
    // handling errors
    $errors = $validation->errors();
    $msg=$errors->firstOfAll('<li>:message</li>');
    $message  =   new Message('Enter mandatory fields','error');
    $message->setMessage();

} else {

$config = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $config);
$return=$auth->register($_POST['email'],$_POST['password'],$_POST['cpassword']);

$user_id=$return['uid'];
if($user_id){

$msg= "Admin Created Successful  with id-".$user_id;
   $message    =   new Message($msg,'success');
   $message->setMessage();
header("Location:administrators.php");
exit;
}else{

$msg=$return['message'];
 $message    =   new Message($msg,'error');
 $message->setMessage();
}
header("Location:addadministrator.php");
exit;
}

}

$sessionProvider = new EasyCSRF\NativeSessionProvider();
$easyCSRF = new EasyCSRF\EasyCSRF($sessionProvider);
$token = $easyCSRF->generate('my_token');
?>
<div class="container">

      <div class="row">
<?php include("sidebar.php");  ?>
 
 <div class="col-md-9"> 

	<form method="post" enctype="multipart/form-data" action="addadministrator.php">
		    <input type="hidden" name="token" value="<?php echo $token; ?>">
		  <div class="form-group">
 <?php $message  =   new Message('','');
       $message->showMessage();
       $message->clearmessage();
        ?>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="true">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required="true">
  </div>


  <button type="submit" name="submit" class="btn btn-primary">Save</button>
</form>
</div>
</div>
<?php include("footer.php"); ?>

