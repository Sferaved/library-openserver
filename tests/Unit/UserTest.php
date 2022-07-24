<?php


use App\Models\Book;
use App\Models\User;
use Codeception\Util\Stub;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }

    public function testUserSave()
    {
        $this->assertTrue(true);

        $user = Stub::make(User::class, ['name' => null]);
        $user = Stub::make(User::class, ['readAll' =>function(){
            return true;
        }]);

        $user = Stub::makeEmpty(User::class, array('name' => 'Serj'));
        Stub::update($user, [
            'name' => 'newName',
            'email' => 'newName@gmail.com'
        ]);

        $userName = Stub::make(User::class, ['getName' => Stub::consecutive('Andrii')]);
        $user->getName(); //david
    }
}
