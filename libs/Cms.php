<?php


use voku\db\ActiveRecord;

/**
 * @property int    $page_id
 * @property int    $order
 * @property int    $level
 * @property int    $parent
 * @property int    $position
 * @property int    $published
 * @property int    $default
 * @property int    $featured
 * @property string    $title
 * @property string    $content
 * @property string    $image
 * @property string    $date_update
 */
class Cms extends ActiveRecord {
  public $table = 'ottil_cms';

  public $primaryKey = 'page_id';

  public $primaryKeyName='page_id';
  
  protected function init()
  {
   
  }


}
  ?>