<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\User;
use Deg540\PHPTestingBoilerplate\UserLoginService;
use PHPUnit\Framework\TestCase;

final class UserLoginServiceTest extends TestCase
{
    /**
     * @test
     */
    public function userIsLoggedIn()
    {
        $userLoginService = new UserLoginService();

        $this->assertEquals("user logged", $userLoginService->loginManually());
    }
    /**
     * @test
     */
    public function getNoLoggedUsers(){
        $userLoginService = new UserLoginService();

        $this->assertEquals([], $userLoginService->getLoggedUsers());
    }

    /**
     * @test
     */
    public function getLoggedUser(){
        $userLoginService = new UserLoginService();
        $user = new User("Juan");
        $userLoginService->addUserToSessionManually($user);

        $this->assertEquals([$user], $userLoginService->getLoggedUsers());
    }

    /**
     * @test
     */
    public function getListLoggedUsers(){
        $userLoginService = new UserLoginService();
        $user1 = new User("Juan");
        $userLoginService->addUserToSessionManually($user1);
        $user2 = new User("Pedro");
        $userLoginService->addUserToSessionManually($user2);

        $this->assertEquals([$user1,$user2],  $userLoginService->getLoggedUsers());
    }

    /**
     * @test
     */
    public function getsTotalExternalSessions(){
        $userLoginService = new UserLoginService(new StubSessionManager());

        $this->assertEquals(5, $userLoginService->countExtrenalSessions());
    }
}
