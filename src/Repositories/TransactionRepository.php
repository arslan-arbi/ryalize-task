<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Transactions;

/**
 * [TransactionRepository]
 */
class TransactionRepository
{

    /**
     * @param string $startDate
     * @param string $endDate
     * @param int $limit
     * @param int $offset
     * 
     * @return mixed
     */
    public function getTransectionsByDateRange(string $startDate, string $endDate, int $limit, int $offset): mixed
    {
        return Transactions::select("transactions.id", "users.name", "amount", "transactions.type", "transactions.created_at as datetime")
                ->join('users', 'users.id', '=', 'transactions.user_id')
                ->join('branch_locations', 'branch_locations.id', '=', 'transactions.branch_location_id')
                ->whereBetween("transactions.created_at",[date($startDate), date($endDate)])
                ->offset($offset)
                ->limit($limit)
                ->get();
    }

}
