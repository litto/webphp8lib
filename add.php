<?php
include("header.php");
use Lablnet\Encryption;
use Rakit\Validation\Validator;
use Ausi\SlugGenerator\SlugGenerator;
//Insert

if(isset($_POST['submit'])){

$validator = new Validator;
// make it
$validation = $validator->make($_POST + $_FILES, [
    'name'                  => 'required',
    'email'                 => 'required|email',
    'password'              => 'required|min:6',
    'txtFile'               => 'required',
    'name'                  => 'required',
]);

// then validate
$validation->validate();

if ($validation->fails()) {
    // handling errors
    $errors = $validation->errors();
    echo "<pre>";
    print_r($errors->firstOfAll());
    echo "</pre>";
    exit;

} else {


$generator = new SlugGenerator;
$slug=$generator->generate($_POST['username']);
$now=date('Y-m-d H:i:s');
$ts_8pm=strtotime($now);
$upload = new \Delight\FileUpload\FileUpload();
$upload->withTargetDirectory('/uploads');
$upload->withMaximumSizeInMegabytes(2);
$upload->withAllowedExtensions([ 'jpeg', 'jpg', 'png', 'gif' ]);
$upload->withTargetFilename($slug.$ts_8pm);
$upload->from('txtFile');

try {
    $uploadedFile = $upload->save();
    $avatar=$uploadedFile->getFilename();
    // success

    // $uploadedFile->getFilenameWithExtension()
    // $uploadedFile->getFilename()
    // $uploadedFile->getExtension()
    // $uploadedFile->getDirectory()
    // $uploadedFile->getPath()
    // $uploadedFile->getCanonicalPath()
}
catch (\Delight\FileUpload\Throwable\InputNotFoundException $e) {
    // input not found
}
catch (\Delight\FileUpload\Throwable\InvalidFilenameException $e) {
    // invalid filename
}
catch (\Delight\FileUpload\Throwable\InvalidExtensionException $e) {
    // invalid extension
}
catch (\Delight\FileUpload\Throwable\FileTooLargeException $e) {
    // file too large
}
catch (\Delight\FileUpload\Throwable\UploadCancelledException $e) {
    // upload cancelled
}



$user = new User();
$user->username = $_POST['username'];
$passwordentry=$_POST['password'];
$key    =   rand(0,9999).rand(111,999);
$encryption = new Encryption('openssl',$key);
$password = $encryption->encrypt($passwordentry);
$user->password = $password;
$user->pass_key = $key;
$user->email = $_POST['email'];
$user->name = $_POST['name'];
$user->logo = $avatar;
$user->date_create = date('Y-m-d H:i:s');
$user->type = 1;
$user->status = 1;
$user->ip = $_SERVER['REMOTE_ADDR'];
$user_id = $user->insert();
if($user_id){
$msg= "Inserted User with id-".$user_id;
}else{

$msg="Error Saving Records";
}
header("Location:add.php?msg=$msg");
exit;
}

}
?>
<div class="container">

<form method="post" enctype="multipart/form-data" action="add.php">
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
    <label for="exampleInputPassword1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username" required="true">
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Full Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Full Name" required="true">
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

