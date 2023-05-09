<?php

namespace Jameslilliott\JamesLogger;

use Psr\Log\LogLevel;
use Psr\Log\AbstractLogger;


class JamesLogger extends AbstractLogger
{
    public function __construct(private readonly WriterInterface $writer)
    {}

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $prefix = match ($level) {
            LogLevel::EMERGENCY => '[EMERGENCY]',
            LogLevel::ALERT => '[ALERT]',
            LogLevel::CRITICAL => '[CRITICAL]',
            LogLevel::ERROR => '[ERROR]',
            LogLevel::WARNING => '[WARNING]',
            LogLevel::NOTICE => '[NOTICE]',
            LogLevel::INFO => '[INFO]',
            LogLevel::DEBUG => '[DEBUG]',
            default => throw new \InvalidArgumentException('Invalid log level.'),
        };

        $this->writer->write($prefix . ' ' .  $message . ' ' . json_encode($context));
    }
}