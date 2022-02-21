<?php


use voku\db\ActiveRecord;

/**
 * @property int       $id
 * @property string    $username
 * @property string    $password
 * @property string    $pass_key
 * @property string    $email
 * @property string    $name
 * @property string    $logo
 * @property string    $date_create
 * @property int       $type
 * @property int       $status
 * @property string    $ip
 */
class User extends ActiveRecord {
  public $table = 'ottil_admin';

  public $primaryKey = 'id';
  
  protected function init()
  {
   
  }


 public function addrecord($insert){

 	if($_SERVER['REMOTE_ADDR']!=''){
		$ip=$_SERVER['REMOTE_ADDR'];
	}else{
		$ip="local";
	}
$user = new User();
$user->username = $insert['username'];
$user->password = $insert['password'];
$user->pass_key =$insert['key'];
$user->email = $insert['email'];
$user->name = $insert['name'];
$user->logo = $insert['logo'];
$user->date_create = date('Y-m-d H:i:s');
$user->type = 1;
$user->status = 1;
$user->ip = $ip;
$user_id = $user->insert();
return $user_id;

  }

public function updaterecord($update,$id)
{
	if($_SERVER['REMOTE_ADDR']!=''){
		$ip=$_SERVER['REMOTE_ADDR'];
	}else{
		$ip="local";
	}
$user = new User();
$user->fetchById($id);
$user->username = $update['username'];
$user->password = $update['password'];
$user->pass_key = $update['key'];
$user->email = $update['email'];
$user->name = $update['name'];
$user->ip = $ip;
$user_id = $user->update();
return $id;

}

public function deleterecord($id)
{

$user = new User();
$user->fetchById($id);
$user->delete();
return true;

}

public function checkdetails($id)
{
$user = new User();
$cond="id='".$id."'";
$user->where($cond)->fetch();
if($user->id!='')
{

return 1;

} else{

return 0;

}

}



}





?>