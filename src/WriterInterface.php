<?php

namespace Jameslilliott\JamesLogger;

interface WriterInterface
{
    public function write(string $text): bool;
}