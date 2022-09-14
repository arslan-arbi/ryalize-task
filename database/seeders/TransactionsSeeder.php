<?php


use Phinx\Seed\AbstractSeed;

class TransactionsSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'LocationSeeder',
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = array();

        for($i = 0; $i < 110000; $i++) {
            $data[] = [
                "user_id" => rand(1, 3),
                "branch_location_id" => rand(1, 10),
                "amount" => rand(500, 20000),
                "type" => array("deposit", "withdraw")[rand(0, 1)],
                'updated_at' => array('2022-08-14 00:09:26', '2022-09-14 00:09:26', '2022-09-15 00:09:26', '2022-09-16 00:09:26', '2022-09-17 00:09:26', '2022-09-18 00:09:26')[rand(0, 5)],
                'created_at' => array('2022-08-14 00:09:26', '2022-09-14 00:09:26', '2022-09-15 00:09:26', '2022-09-16 00:09:26', '2022-09-17 00:09:26', '2022-09-18 00:09:26')[rand(0, 5)],
            ];

            if(($i+1) % 5000 == 0) {
                $transactions = $this->table('transactions');
                $transactions->insert($data)
                      ->saveData();    
        
                $data = array();
            }
        }
    }
}
