<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * [Transactions]
 */
class Transactions extends Model
{
    /**
     * @var string
     */
    protected $table = 'transactions';

    /**
     * @var array
     */

    protected $fillable = ["user_id", "branch_location_id", "amount", "type"];
}
