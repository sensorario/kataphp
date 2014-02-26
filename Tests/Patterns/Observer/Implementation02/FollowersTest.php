<?php

namespace Tests\Patterns\Observer\Implementation02;

use PHPUnit_Framework_TestCase;
use Patterns\Observer\Implementation02\Page;

class FollowersTest extends PHPUnit_Framework_TestCase
{
    public function testPageIsObservervable()
    {
        $page = new Page();
        $this->assertTrue(true);
    }

    public function testUsersAreObserver()
    {
    }

    public function testFollowerReceiveNotificaionWhenAPageSaySomething()
    {
    }
}
