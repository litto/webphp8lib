<?php


use voku\db\ActiveRecord;

/**
 * @property int       $id
 * @property string    $email 
 * @property string    $password
 * @property string    $dt
 * @property int       $isactive
 */
class Administrator extends ActiveRecord {
  public $table = 'phpauth_users';

  public $primaryKey = 'id';
  
  protected function init()
  {
   
  }


 


public function checkdetails($id)
{
$user = new Administrator();
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