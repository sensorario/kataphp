<?php

namespace Tests\Patterns\Observer;

use Patterns\Observer\User;
use PHPUnit_Framework_TestCase;

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testUser()
    {
        $user = new User('simone');

        $this->assertInstanceOf('\SplObserver', $user);
        $this->assertInstanceOf('\SplSubject', $user);
    }

    public function testGetter()
    {
        $user = new User('pippo');
        $this->assertEquals('pippo', $user->getUsername());
    }

    public function testObserver()
    {
        $simone = new User('simone');
        $marco = new User('marco');
        $andrea = new User('andrea');
        $cesare = new User('cesare');

        $cesare->attach($simone);
        $cesare->attach($marco);
        $this->assertEquals(
            [$simone, $marco],
            $cesare->getObservers()
        );

        $andrea->attach($cesare);
        $this->assertEquals(
            [$cesare],
            $andrea->getObservers()
        );
    }
}
