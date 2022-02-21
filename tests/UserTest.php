<?php
include('config.php');

use PHPUnit\Framework\TestCase;
use Lablnet\Encryption;
use Rakit\Validation\Validator;
use Ausi\SlugGenerator\SlugGenerator;

// Run php vendor/bin/phpunit tests/ UserTest.php
class UserTest extends TestCase
{
    private $insertedid;
    private $oldcount;
    private $strng;
    private $email;
    private $key;
    private $password;
    private $logo;
    private $newinsertedid;
    private $newstrng;
    private $newemail;
    private $newkey;
    private $newpassword;
    private $newlogo;


protected function setUp(): void
{

$util=new Utilities();
$this->strng=$util->generateRandomString();
$this->email=$this->strng.'@mail.com';
$this->key    =   rand(0,9999).rand(111,999);
$encryption = new Encryption('openssl',$this->key);
$this->password = $encryption->encrypt($this->strng);
$this->logo='logo.png';

$this->newstrng=$util->generateRandomString();
$this->newemail=$this->newstrng.'@mail.com';
$this->newkey    =   rand(0,9999).rand(111,999);
$newencryption = new Encryption('openssl',$this->newkey);
$this->newpassword = $newencryption->encrypt($this->newstrng);
$this->newlogo='newlogo.png';
}


public function testUserAdd()
    {
$disp=new Display();
echo $disp->caution("Starting User Insert Testing!!");
echo '</br>';
$user5 = new User();
$users=$user5->where('status=1')->fetchAll();
$oldcount=count($users);    	

$user1 = new User();
$insert=array('username'=>$this->strng,'password'=>$this->password,'name'=>$this->strng,'email'=>$this->email,'key'=>$this->key,'logo'=>$this->logo);
$this->insertedid=$user1->addrecord($insert);
$_SESSION['insertid']=$this->insertedid;
$this->assertIsInt($this->insertedid);


$fetchrecord = new User();
$fetchrecord->fetchById($this->insertedid);
$this->assertEquals($this->strng, $fetchrecord->username,$disp->warning("Username Field failed"));
$this->assertEquals($this->strng, $fetchrecord->name,$disp->warning("Name Field failed"));
$this->assertEquals($this->email, $fetchrecord->email,$disp->warning("Email Field failed"));
$this->assertEquals($this->password, $fetchrecord->password,$disp->warning("Password Field failed"));
$this->assertEquals($this->key, $fetchrecord->pass_key,$disp->warning("Key Field failed"));
   $user2 = new User();
   $userslist=$user2->where('status=1')->fetchAll();
   $nowcount=count($userslist);
   $calcount=$oldcount+1;
   $this->assertEquals($calcount,$nowcount,$disp->warning("Count Not Equal"));
   echo '</br>';
echo $disp->OK("User Inserting Function is Working!!");
echo '</br>';

}


public function testUserEdit()
    {

$disp=new Display();
echo $disp->caution("Starting User Edit  Testing!!");
echo '</br>';
$user1 = new User();
$update=array('username'=>$this->newstrng,'password'=>$this->newpassword,'name'=>$this->newstrng,'email'=>$this->newemail,'key'=>$this->newkey,'logo'=>$this->newlogo);
$this->newinsertedid=$user1->updaterecord($update,$_SESSION['insertid']);
$fetchrecord = new User();
$fetchrecord->fetchById($_SESSION['insertid']);
$this->assertEquals($this->newstrng, $fetchrecord->username,$disp->warning("Username Field failed"));
$this->assertEquals($this->newstrng, $fetchrecord->name,$disp->warning("Name Field failed"));
$this->assertEquals($this->newemail, $fetchrecord->email,$disp->warning("Email Field failed"));
$this->assertEquals($this->newpassword, $fetchrecord->password,$disp->warning("Password Field failed"));
$this->assertEquals($this->newkey, $fetchrecord->pass_key,$disp->warning("Key Field failed"));
echo '</br>';
echo $disp->OK("User Inserting Function is Working!!");
echo '</br>';
}


public function testUserDelete()
{
	
$disp=new Display();
echo '</br>';
echo $disp->caution("Starting User Delete  Testing!!");
$user1 = new User();
$user1->deleterecord($_SESSION['insertid']);

$user34 = new User();
$returnval=$user34->checkdetails($_SESSION['insertid']);
$this->assertEquals(0, $returnval,$disp->warning("Delete Action failed"));
echo '</br>';
echo $disp->OK("User Deletion Function is Working!!");
unset($_SERVER['insertid']);
echo '</br>';
echo $disp->OK("Module is Working Fine..!!");
echo '</br>';
}








}


?>