<?php

namespace Tests\Patterns\Observer;

use Patterns\Observer\User;
use PHPUnit_Framework_TestCase;

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testUser()
    {
        $user = new User();
        $this->assertInstanceOf('\SplObserver', $user);
    }
}
