<?php
include("header.php");
include("session.php");
use Lablnet\Encryption;
use Rakit\Validation\Validator;
use Ausi\SlugGenerator\SlugGenerator;
use EasyCSRF\Exceptions\InvalidCsrfTokenException;

if(isset($_POST['submit'])){
$id=$_POST['id'];
$sessionProvider = new EasyCSRF\NativeSessionProvider();
$easyCSRF = new EasyCSRF\EasyCSRF($sessionProvider);
try {
    $easyCSRF->check('my_token', $_POST['token']);
} catch(InvalidCsrfTokenException $e) {
   $errormsg= $e->getMessage();
     $message  =   new Message($errormsg,'error');
    $message->setMessage();
header("Location:edit_adminpass.php?id=".$id);
exit;
}

$validator = new Validator;
// make it
$validation = $validator->make($_POST + $_FILES, [
    'currentpassword'       => 'required|min:6',
    'newpassword'           => 'required|min:6',
    'cpassword'             => 'required|min:6'
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

$auth_id=base64_decode($_POST['id']);


$config = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $config);
$return=$auth->changePassword($auth_id,$_POST['currentpassword'],$_POST['newpassword'],$_POST['cpassword']);


if(!$return['error']){
$msg= $return['message'];
   $message    =   new Message($msg,'success');
   $message->setMessage();
header("Location:administrators.php");
exit;
}else{

$msg="Error Saving Records";
 $message    =   new Message($msg,'error');
 $message->setMessage();
}
header("Location:edit_adminpass.php?id=".$id);
exit;
}

}

$id=base64_decode($_GET['id']);
$config = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $config);
$user=$auth->getUserDetails($id);




$sessionProvider = new EasyCSRF\NativeSessionProvider();
$easyCSRF = new EasyCSRF\EasyCSRF($sessionProvider);
$token = $easyCSRF->generate('my_token');
?>
<div class="container">
    <div class="row">
<?php include("sidebar.php");  ?>
 
 <div class="col-md-9"> 
	<form method="post" enctype="multipart/form-data" action="edit_adminpass.php?id=<?php echo $_GET['id'];?>">
				    <input type="hidden" name="token" value="<?php echo $token; ?>">
				    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

		  <div class="form-group">
 <?php $message  =   new Message('','');
       $message->showMessage();
       $message->clearmessage();
        ?>
</div>

  <div class="form-group">
    <label for="exampleInputPassword1"> Current Password</label>
    <input type="password" name="currentpassword" class="form-control" id="exampleInputPassword1" placeholder="Current Password" required="true">
  </div>

 <div class="form-group">
    <label for="exampleInputPassword1"> New  Password</label>
    <input type="password" name="newpassword" class="form-control" id="exampleInputPassword1" placeholder="Current Password" required="true">
  </div>

   <div class="form-group">
    <label for="exampleInputPassword1"> Confirm  Password</label>
    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Current Password" required="true">
  </div>

  
  <button type="submit" name="submit" class="btn btn-primary">Change</button>
</form>
</div>
</div>
<?php include("footer.php"); ?>

