<?php


use voku\db\ActiveRecord;

/**
 * @property int       $auth_id
 * @property string    $username
 * @property string    $password
 * @property string    $pass_key
 * @property string    $email
 * @property string    $name
 * @property string    $logo
 * @property string    $date_create
 * @property int       $type
 * @property int       $status
 * @property int       $id
 * @property string    $ip
 */
class User extends ActiveRecord {
  public $table = 'ottil_admin';

  public $primaryKey = 'auth_id';
  
  protected function init()
  {
   
  }



}





?>