<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

/**
 * [UserRepository]
 */
class UserRepository
{

    /**
     * addUser
     *
     * @param  array $userData
     * @return bool
     */
    public function addUser(array $userData): bool
    {
        User::create($userData);
        return true;
    }


    /**
     * getUserByEmail
     *
     * @param  string $email
     * @return User | Null
     */
    public function getUserByEmail(string $email): mixed
    {
        return User::where('email', $email)->first();
    }


    /**
     * @param int $id
     * 
     * @return mixed
     */
    public function getUserById(int $id): mixed
    {
        return User::find($id);
    }


    /**
     * @param int $id
     * @param array $userData
     * 
     * @return bool
     */
    public function updateUser(int $id, array $userData): bool
    {
        $user = $this->getUserById($id);

        if($user) {
            return $user->update($userData);
        }
        return false;    
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function deleteUser(int $id): bool
    {
        $user = $this->getUserById($id);

        if($user) {
            return $user->delete();
        }
        return false;
    }

}
