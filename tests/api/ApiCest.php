<?php

class ApiCest
{
    public function _before(ApiTester $I)
    {
        //
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        //
    }

    public function createUserViaAPI(ApiTester $I)
    {
        $I->amHttpAuthenticated('service_user', '123456');
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPost('/register', [
            'name' => 'Bob11',
            'email' => 'sferaved111@gmail.com',
            'password' => '112233',
            'c_password' => '112233'
        ]);
        $I->seeResponseCodeIsSuccessful();
    }

    public function loginUserViaAPI(ApiTester $I)
    {
        $I->sendPost('/login', [
            'email' => 'sferaved@gmail.com',
            'password' => '112233'
        ]);
        $I->seeResponseCodeIsSuccessful();
    }

    public function booksViaAPI(ApiTester $I)
    {
        $I->sendGet('/booksApi');
        $I->seeResponseCodeIsSuccessful();
    }
}
