<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AdminMigration extends AbstractMigration
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

        $exists = $this->hasTable('ottil_admin');
         if (!$exists) {
// create the table
        $table = $this->table('ottil_admin', ['id' => false, 'primary_key' => ['auth_id']]);
        $table->addColumn('auth_id', 'integer' , ['limit' => 100])
              ->addColumn('username', 'string' , ['limit' => 200])
              ->addColumn('password', 'string', ['limit' => 200])
              ->addColumn('pass_key', 'string', ['limit' => 200])
              ->addColumn('email', 'string', ['limit' => 200])
              ->addColumn('name', 'string', ['limit' => 200])
              ->addColumn('date_create', 'datetime')
              ->addColumn('type', 'integer', ['limit' => 20])
              ->addColumn('status', 'integer', ['limit' => 20])
              ->addIndex(['username', 'email'], ['unique' => true])
              ->create();


          }

    }
}
