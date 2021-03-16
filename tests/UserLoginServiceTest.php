<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\FacebookSessionManager;
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
        $userLoginService = new UserLoginService(new DummySessionManager());

        $this->assertEquals("user logged", $userLoginService->loginManually());
    }
    /**
     * @test
     */
    public function getNoLoggedUsers(){
        $userLoginService = new UserLoginService(new DummySessionManager());

        $this->assertEquals([], $userLoginService->getLoggedUsers());
    }

    /**
     * @test
     */
    public function getLoggedUser(){
        $userLoginService = new UserLoginService(new DummySessionManager());
        $user = new User("Juan");
        $userLoginService->addUserToSessionManually($user);

        $this->assertEquals([$user], $userLoginService->getLoggedUsers());
    }

    /**
     * @test
     */
    public function getListLoggedUsers(){
        $userLoginService = new UserLoginService(new DummySessionManager());
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
        $user = new User("Sergio");
        $userLoginService->addUserToSessionManually($user);

        $this->assertEquals(6, $userLoginService->countExtrenalSessions());
    }

    /**
     * @test
     */
    public function notValidUserLogin()
    {
        $userLoginService = new UserLoginService(new FakeSessionManager());
        $user = new User("Pedro");
        $password = "1563";
        $return = $userLoginService->login($user,$password);
        $this->assertEquals("No se ha podido loggear",$return);
    }

    /**
     * @test
     */
    public function validUserLogin()
    {
        $userLoginService = new UserLoginService(new FakeSessionManager());
        $user = new User("Sergio");
        $password = "1234";
        $return = $userLoginService->login($user,$password);
        $this->assertEquals("ok",$return);
        $this->assertCount(1,$userLoginService->getLoggedUsers());
        $this->assertEquals("Sergio",$userLoginService->getLoggedUsers()[0]->getName());
    }

    /**
     * @test
     */
    public function userIsNotLogged(){
        $userLoginService = new UserLoginService(new FakeSessionManager());
        $user = new User("Juan");
        $return = $userLoginService->logout($user);
        $this->assertEquals("no esta logeado", $return);
    }

    /**
     * @test
     */
    public function userIsLogged(){
        $userLoginService = new UserLoginService(new FakeSessionManager());
        $user = new User("Sergio");
        $password = "1234";
        $userLoginService->login($user,$password);
        $return = $userLoginService->logout($user);
        $this->assertEquals("esta logeado", $return);
        $this->assertCount(0,$userLoginService->getLoggedUsers());
    }

}
