<?php


namespace Deg540\PHPTestingBoilerplate;


class AppRunner
{
    public function run(){
        $userLoginService = new UserLoginService(new FacebookSessionManager());
        $userLoginService->countExtrenalSessions()
    }
}