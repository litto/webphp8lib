<?php
include("header.php");
use Lablnet\Encryption;

//Insert

if(isset($_POST['submit'])){
$user = new User();
$user->username = 'accountuser';
$key    =   rand(0,9999).rand(111,999);
$encryption = new Encryption('openssl',$key);
$password = $encryption->encrypt("admin@2022");
$user->password = $password;
$user->pass_key = $key;
$user->email = 'account@gmail.com';
$user->name = 'Chacko';
$user->logo = 'user.png';
$user->date_create = date('Y-m-d H:i:s');
$user->type = 1;
$user->status = 1;
$user->ip = $_SERVER['REMOTE_ADDR'];
$user_id = $user->insert();

echo "Inserted User with id-".$user_id;

}
?>
<div class="container">

<form>
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

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Save</button>
</form>
</div>
<?php include("footer.php"); ?>

