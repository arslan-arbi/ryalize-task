<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatetransactionsTable extends AbstractMigration
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
        $users = $this->table('transactions');
        $users->addColumn('user_id', 'integer')
              ->addColumn('branch_location_id', 'integer')
              ->addColumn('amount', 'integer')
              ->addColumn('type', 'string', ['limit' => 30])
              ->addColumn('updated_at', 'datetime')
              ->addColumn('created_at', 'datetime')
              ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update'=> 'NO_ACTION'])
              ->addForeignKey('branch_location_id', 'branch_locations', 'id', ['delete' => 'CASCADE', 'update'=> 'NO_ACTION'])
              ->addIndex(['user_id', 'branch_location_id'])
              ->create();
    }

    public function down(): void 
    {
        $this->table('transactions')->drop()->save();
    }
}
