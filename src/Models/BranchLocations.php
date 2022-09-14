<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * [BranchLocations]
 */
class BranchLocations extends Model
{
    /**
     * @var string
     */
    protected $table = 'branch_locations';

    /**
     * @var array
     */

    protected $fillable = ["location"];
}
