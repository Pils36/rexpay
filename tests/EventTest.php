<?php
namespace Pils36\Rexpay\Tests;

use Pils36\Rexpay\Test\Mock\EventTestDouble as MockEvent;
use Pils36\Rexpay\Event;

class EventTest extends \PHPUnit_Framework_TestCase
{
    public function testDiscoverOwner()
    {
        $evt = MockEvent::dummyCapture();


        $this->assertEquals('nameee', $evt->discoverOwner([
            'notme'=>'sk_live_inv4L1dinv4L1dinv4L1dinv4L1d',
            'notmeeither'=>'sk_test_inv4L1dinv4L1dinv4L1d',
            'nameee'=>'sk_test_inv4L1dinv4L1dinv4L1dinv4L1d',
        ]));
    }

    public function testCapture()
    {
        $evt = Event::capture();
        $this->assertNotNull($evt);
        $this->assertEmpty($evt->raw);
        $this->assertEmpty($evt->obj);
    }

    public function testPackage()
    {
        $evt = MockEvent::dummyCapture();
        $pack = $evt->package();
        $this->assertNotNull($pack);
        $this->assertEquals('POST', $pack->method);
        $this->assertEquals(MockEvent::DUMMY_RAW, $pack->body);
    }

    public function testForwardTo()
    {
        $evt = MockEvent::dummyCapture();
        $this->assertTrue($evt->forwardTo('nowhere'));
    }

    public function testForwardToRejectsInvalidUrl()
    {
        $evt = Event::capture();
        $this->assertFalse($evt->forwardTo(null));
    }

    public function testValidFor()
    {
        $evt = MockEvent::dummyCapture();
        $this->assertTrue($evt->validFor('sk_test_inv4L1dinv4L1dinv4L1dinv4L1d'));
    }
}