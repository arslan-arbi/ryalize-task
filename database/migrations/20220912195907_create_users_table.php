<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
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
        $users = $this->table('users');
        $users->addColumn('email', 'string', ['limit' => 100])
              ->addColumn('password', 'string', ['limit' => 200])
              ->addColumn('name', 'string', ['limit' => 60])
              ->addColumn('type', 'string', ['limit' => 10])
              ->addColumn('phone_number', 'string', ['limit' => 30])
              ->addColumn('address', 'string', ['limit' => 100])
              ->addColumn('updated_at', 'datetime')
              ->addColumn('created_at', 'datetime')
              ->addIndex(['email'], ['unique' => true])
              ->create();
    }

    public function down(): void 
    {
        $this->table('users')->drop()->save();
    }
}   
