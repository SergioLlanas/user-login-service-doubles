<?php


namespace Deg540\PHPTestingBoilerplate\Test;


use Deg540\PHPTestingBoilerplate\SessionManager;
use Deg540\PHPTestingBoilerplate\User;

class FakeSessionManager implements SessionManager
{

    public function getSessions(): int
    {
        //implements getSession() method
    }

    public function login(string $userName, string $password): bool
    {
        return $userName == "Sergio" && $password=="1234";
    }

    public function logout(User $user): bool
    {
        // TODO: Implement logout() method.
    }

}