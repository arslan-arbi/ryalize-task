<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserRepository;
use Firebase\JWT\JWT;
use App\Models\User;

/**
 * [AuthService]
 */
class AuthService
{

    const DEFAULT_USER_TYPE = "customer";

    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }


    /**
     * @param array $userData
     * 
     * @return bool
     */
    public function register(array $userData): bool
    {
        if (!$this->emailAlreadyExists($userData["email"])) {

            $userData["password"] = password_hash($userData["password"], PASSWORD_DEFAULT);
            $userData["type"] = self::DEFAULT_USER_TYPE;
            return $this->userRepository->addUser($userData);
        }
        return false;
    }

    /**
     * @param array $credentials
     * 
     * @return mixed
     */
    public function login(array $credentials): mixed
    {
        $user = $this->userRepository->getUserByEmail($credentials["email"]);

        if ($user) {
            if (password_verify($credentials["password"], $user->password)) {
                return ["token" => $this->generateToken($user)];
            }
        }
        return false;
    }

    /**
     * @param User $user
     * 
     * @return string
     */
    private function generateToken(User $user): string
    {
        $now = time();
        $future = strtotime('+1 hour', $now);
        $secretKey = $_ENV['JWT_SECRET_KEY'];
        $payload = [
            "jti" => $user,
            "iat" => $now,
            "exp" => $future
        ];

        return JWT::encode($payload, $secretKey, "HS256");
    }

    /**
     * @param string $email
     * 
     * @return mixed
     */
    private function emailAlreadyExists(string $email): mixed
    {
        return $this->userRepository->getUserByEmail($email);
    }
}
