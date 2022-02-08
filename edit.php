<?php
include("header.php");
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
header("Location:edit.php?id=".$id);
exit;
}

$validator = new Validator;
// make it
$validation = $validator->make($_POST + $_FILES, [
    'name'                  => 'required',
    'email'                 => 'required|email',
    'password'              => 'required|min:6',
    'name'                  => 'required',
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


$generator = new SlugGenerator;
$slug=$generator->generate($_POST['username']);

if($_FILES['txtFile']['name']!=''){

 $upl=new Uploader();
  $logo=$upl->uploadimagefile("txtFile");


$auth_id=base64_decode($_POST['id']);
 $user = new User();
  $user->fetchById($auth_id);
  $user->logo = $logo;
  $user->update();

}

$auth_id=base64_decode($_POST['id']);
$user = new User();

//$user->fetch($auth_id);
  //$user->fetchById($auth_id);
$passwordentry=$_POST['password'];
$key    =   rand(0,9999).rand(111,999);
$encryption = new Encryption('openssl',$key);
$password = $encryption->encrypt($passwordentry);
$update=array('username'=>$_POST['username'],'password'=>$password,'name'=>$_POST['name'],'email'=>$_POST['email'],'key'=>$key);
$user_id=$user->updaterecord($update,$auth_id);
// $user->username = $_POST['username'];
// $user->password = $password;
// $user->pass_key = $key;
// $user->email = $_POST['email'];
// $user->name = $_POST['name'];
// $user->ip = $_SERVER['REMOTE_ADDR'];
// $user_id = $user->update();



if($user_id){
$msg= "Record Updated Successfully";
   $message    =   new Message($msg,'success');
   $message->setMessage();
header("Location:index.php");
exit;
}else{

$msg="Error Saving Records";
 $message    =   new Message($msg,'error');
 $message->setMessage();
}
header("Location:edit.php?id=".$id);
exit;
}

}

$id=base64_decode($_GET['id']);
  $user = new User();
 $user->eq('id', $id)->fetch();

$encryption = new Encryption('openssl',$user->pass_key);
$password = $encryption->decrypt($user->password);

$sessionProvider = new EasyCSRF\NativeSessionProvider();
$easyCSRF = new EasyCSRF\EasyCSRF($sessionProvider);
$token = $easyCSRF->generate('my_token');
?>
<div class="container">

	<form method="post" enctype="multipart/form-data" action="edit.php?id=<?php echo $_GET['id'];?>">
				    <input type="hidden" name="token" value="<?php echo $token; ?>">
				    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

		  <div class="form-group">
 <?php $message  =   new Message('','');
       $message->showMessage();
       $message->clearmessage();
        ?>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control"  value="<?php echo $user->email; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="true">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $password; ?>" placeholder="Password" required="true">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" id="exampleInputPassword1" placeholder="Username" required="true">
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Full Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $user->name; ?>" id="exampleInputPassword1" placeholder="Full Name" required="true">
  </div>

     <div class="form-group">
    <label for="exampleFormControlFile1">Avatar Preview</label>
   <img src="uploads/<?php echo $user->logo; ?>" height="150px" width="150px"/>
  </div>
   <div class="form-group">
    <label for="exampleFormControlFile1">Avatar</label>
    <input type="file" class="form-control-file" name="txtFile" id="exampleFormControlFile1">
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Save</button>
</form>
</div>
<?php include("footer.php"); ?>

