<?php


namespace Deg540\PHPTestingBoilerplate\Test;


use Deg540\PHPTestingBoilerplate\SessionManager;

class DummySessionManager implements SessionManager
{

    public function getSessions(): int
    {
        
    }

    public function login(string $userName, string $password): bool
    {
        // TODO: Implement login() method.
    }
}