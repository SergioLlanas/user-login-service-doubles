<?php


namespace Deg540\PHPTestingBoilerplate\Test;


use Deg540\PHPTestingBoilerplate\SessionManager;
use Deg540\PHPTestingBoilerplate\User;
use PHPUnit\Util\Exception;

class MockSessionManager implements SessionManager
{

    public function getSessions(): int
    {
        // TODO: Implement getSessions() method.
    }

    public function login(string $userName, string $password): bool
    {
        if($userName != $this->expectedUserName || $password != $this->expectedPassword){
            throw new Exception("Login incorrecto");
        }
    }

    public function logout(User $user): bool
    {
        // TODO: Implement logout() method.
    }

    public function callLogin(string $userName, string $password)
    {
        $this->expectedUserName = $userName;
        $this->expectedPassword = $password;
    }

    public function times(int $int)
    {
    }

    public function loginWillReturn(string $string)
    {
        return $this->loginReturn = $string;
    }
}