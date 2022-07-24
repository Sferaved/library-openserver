<?php

use App\Models\Book;
use App\Models\User;
use Codeception\Util\Stub;
use Illuminate\Support\Facades\DB;

$I = new UnitTester($scenario);
$I->wantTo('perform actions and see result');
$I->assertTrue(true);

$user = Stub::make(User::class, ['name' => null]);
$user = Stub::make(User::class, ['readAll' =>function(){
    return true;
}]);
$user = Stub::makeEmpty(User::class, array('name' => 'Serj'));
Stub::update($user, [
    'name' => 'newName',
    'email' => 'newName@gmail.com'
]);

$book = Stub::make(Book::class, [
    'save' => \Codeception\Stub\Expected::once()
], $this);

$userName = Stub::make(User::class, ['getName' => Stub::consecutive('Andrii')]);
$user->getName(); //david



