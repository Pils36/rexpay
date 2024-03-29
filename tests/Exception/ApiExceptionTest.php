<?php

namespace Pils36\Rexpay\Tests\Exception;

use Pils36\Rexpay\Exception\ApiException;

class ApiExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testInitialize()
    {
        $e = new ApiException('message', new \stdClass(), new \stdClass());
        $this->assertNotNull($e);
        $this->assertNotNull($e->getResponseObject());
        $this->assertNotNull($e->getRequestObject());
    }
}
