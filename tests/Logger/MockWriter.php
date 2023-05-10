<?php

namespace Jameslilliott\Tests\Logger;

use Jameslilliott\JamesLogger\WriterInterface;

class MockWriter implements WriterInterface
{
    public string $written = '';

    public function write(string $text): bool
    {
        $this->written .= $text;
        return true;
    }
}