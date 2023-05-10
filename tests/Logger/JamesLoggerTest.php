<?php

namespace Jameslilliott\Tests\Logger;

use Jameslilliott\JamesLogger\JamesLogger;
use PHPUnit\Framework\TestCase;

class JamesLoggerTest extends TestCase
{

    public function testLogger(): void
    {
        $mockWriter = new MockWriter();
        $jamesLogger = new JamesLogger($mockWriter);

        $log = 'My Alert';
        $jamesLogger->alert($log);

        $this->assertEquals('[ALERT] ' . $log . ' []', $mockWriter->written);
    }

}
