<?php

use App\Models\Book;
use App\Models\User;

class FunctCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }

    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->click('Login');
        $I->see('Login');
        $I->seeElement('login-component');
        $I->click('Register');
    }

    public function tryBook(FunctionalTester $I)
    {
        $I->amOnPage('/books');
    }

    public function tryPrivate(FunctionalTester $I)
    {
        $I->amLoggedAs([
            'email' => 'andrey18051@gmail.com',
            'password' => '112233'
        ]);
        $I->amOnPage('/');
        $I->click('Private');
        $I->see('Private page');
        $I->seeElement('privat-component');
    }

    public function seeAuthentication(FunctionalTester $I)
    {
        $I->amLoggedAs([
            'email' => 'andrey18051@gmail.com',
            'password' => '112233'
        ]);
        $I->amOnPage('/');
        $I->seeRecord(User::class, ['email' => 'andrey18051@gmail.com']);
        $I->seeAuthentication();
    }

    public function seeApiLogin(FunctionalTester $I)
    {
        $I->amOnPage('/api/login');
        $I->amLoggedAs([
            'email' => 'andrey18051@gmail.com',
            'password' => '112233'
        ]);
        $I->seeRecord(User::class, ['email' => 'andrey18051@gmail.com']);
        $I->seeAuthentication();
    }

    public function seeApiRegister(FunctionalTester $I)
    {
        $I->amOnPage('/api/register');
        $I->sendAjaxPostRequest('/api/register', [
            'name' => 'Bob',
            'email' => 'sferaved1111@gmail.com',
            'password' => '112233',
            'c_password' => '112233'
        ]);
        $I->seeRecord(User::class, ['email' => 'sferaved1111@gmail.com']);
    }

    public function seeApiBooks(FunctionalTester $I)
    {
        $I->amOnPage('/api/booksApi');
        $I->sendAjaxPostRequest('/api/booksApi', [
            'author_id' => '2',
            'category_id' => '3',
            'description' => 'Description on my book',
            'cover' => 'images/books/book.jpg'
        ]);
        $I->dontSeeResponseCodeIs(200);
    }

    public function seeApiBooksCreat(FunctionalTester $I)
    {
        $I->amLoggedAs([
            'email' => 'andrey18051@gmail.com',
            'password' => '112233'
        ]);
        $I->amOnPage('/api/booksApi');
        $I->sendAjaxGetRequest('/api/booksApi');
        $I->dontSeeResponseCodeIs(200);
    }
}
