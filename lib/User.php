<?php

namespace demo;

use ..\voku\db\ActiveRecord;

/**
 * @property int       $id
 * @property string    $name
 * @property string    $password
 * @property Contact[] $contacts
 * @property Contact   $contacts_with_backref
 * @property Contact   $contact
 */
class User extends ActiveRecord {
  public $table = 'ottil_admin';

  public $primaryKey = 'auth_id';
  
  protected function init()
  {
   
  }


  
}





?>