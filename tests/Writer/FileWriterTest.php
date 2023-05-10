<?php

namespace Jameslilliott\Tests\Writer;

use Jameslilliott\JamesLogger\FileWriter;
use PHPUnit\Framework\TestCase;

class FileWriterTest extends TestCase
{

    public function testWriterWrites(): void
    {
        // Arrange
        $fileLocation = 'test.txt';
        $testString = "Test Text";
        $fileWriter = new FileWriter($fileLocation);

        // Act
        $result = $fileWriter->write($testString);

        // Assert
        $this->assertTrue($result);
        $writtenText = file_get_contents($fileLocation);
        $this->assertEquals($testString, trim($writtenText));

        // Clean up
        unlink($fileLocation);
    }

}
