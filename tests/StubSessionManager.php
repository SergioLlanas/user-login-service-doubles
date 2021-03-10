<?php


namespace Deg540\PHPTestingBoilerplate\Test;


use Deg540\PHPTestingBoilerplate\SessionManager;

class StubSessionManager implements SessionManager
{

    public function getSessions(): int
    {
        return 5;
    }

    public function login(string $userName, string $password): bool
    {
        // TODO: Implement login() method.
    }
}