<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * [User]
 */
class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = ["name", "email", "password", "type", "phone_number", "address"];
}
