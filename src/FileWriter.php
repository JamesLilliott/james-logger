<?php

namespace Jameslilliott\JamesLogger;

class FileWriter implements WriterInterface
{

    public function __construct(private readonly string $filePath)
    {}

    public function write(string $text): bool
    {
        return (bool) file_put_contents($this->filePath, $text . "\n", FILE_APPEND);
    }
}