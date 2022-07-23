<?php

class AcceptCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Home');
    }

    public function loginpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/auth/login');
        $I->see('Login');
        $I->seeElement('login-component');
        $I->seeElement('router-view');
    }
}
