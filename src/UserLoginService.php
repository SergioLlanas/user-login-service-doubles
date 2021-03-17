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
        return $this->sessionManager->getSessions() + count($this->getLoggedUsers());
    }

    public function login(User $user, String $password): String
    {
        if($this->sessionManager->login($user->getName(),$password)){
            $this->addUserToSessionManually($user);
            return "ok";
        }
        if(!$this->sessionManager->login($user->getName(),$password)){
            return "No se ha podido loggear";
        }

    }

    public function logout(User $user)
    {
        if(in_array($user,$this->getLoggedUsers())){
            $this->loggedUsers = [];
            return "esta logeado";
        }
        return "no esta logeado";
    }



}