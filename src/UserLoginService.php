<?php

namespace Deg540\PHPTestingBoilerplate;

use Deg540\PHPTestingBoilerplate;

class UserLoginService
{
    private array $loggedUsers = [];
    /**
     * @var SessionManager
     */
    private SessionManager $sessionManager;

    /**
     * UserLoginService constructor.
     * @param SessionManager $sessionManager
     */
    public function __construct(SessionManager $sessionManager){
        $this->sessionManager = $sessionManager;
    }
    public function loginManually(): string
    {
        return "user logged";
    }

    public function addUserToSessionManually(User $user): void
    {
        $this->loggedUsers[] = $user;
    }

    public function getLoggedUsers()
    {
        return $this->loggedUsers;
    }

    public function countExtrenalSessions(): int
    {
        return $this->sessionManager->getSessions();
    }

}