<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CmsMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {

              $exists = $this->hasTable('ottil_cms');
         if (!$exists) {
// create the table
        $table = $this->table('ottil_cms', ['id' => false, 'primary_key' => ['page_id']]);
        $table->addColumn('page_id', 'integer' , ['limit' => 120 ,'identity' => true])
              ->addColumn('order', 'integer' , ['limit' => 120])
              ->addColumn('level', 'integer', ['limit' => 20])
              ->addColumn('parent', 'integer', ['limit' => 120])
              ->addColumn('position', 'integer', ['limit' => 20])
              ->addColumn('published', 'integer', ['limit' => 20])
              ->addColumn('default', 'integer', ['limit' => 20])
              ->addColumn('featured', 'integer', ['limit' => 20])
              ->addColumn('title', 'string', ['limit' => 500])
              ->addColumn('content', 'text')
              ->addColumn('image', 'string', ['limit' => 500])
              ->addColumn('date_update', 'datetime')
              ->addIndex(['page_id'], ['unique' => true])
              ->create();


          }

    }
}
