<?php


namespace Deg540\PHPTestingBoilerplate\Test;


use Deg540\PHPTestingBoilerplate\SessionManager;
use Deg540\PHPTestingBoilerplate\User;

class SpySessionManager implements SessionManager
{
    private int $logoutCalls = 0;

    public function getSessions(): int
    {
        // TODO: Implement getSessions() method.
    }

    public function login(string $userName, string $password): bool
    {
        // TODO: Implement login() method.
    }

    public function logout(User $user): bool
    {
        $this->logoutCalls ++;
        // TODO: Implement logout() method.
    }

    public function verifyLogoutCalled(int $times):bool{
        if($this->logoutCalls == $times){
            return true;
        }
       return false;
    }
}