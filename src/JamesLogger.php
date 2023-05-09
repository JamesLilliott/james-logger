<?php

namespace Jameslilliott\JamesLogger;

use Psr\Log\LogLevel;
use Psr\Log\AbstractLogger;


class JamesLogger extends AbstractLogger
{
    public function __construct(private WriterInterface $writer)
    {}

    public function emergency(\Stringable|string $message, array $context = []): void
    {
        $this->writer->write('[EMERGENCY] ' . $message . ' ' . json_encode($context));
    }

    public function alert(\Stringable|string $message, array $context = []): void
    {
        $this->writer->write('[ALERT] ' . $message . ' ' . json_encode($context));
    }

    public function critical(\Stringable|string $message, array $context = []): void
    {
        $this->writer->write('[CRITICAL] ' . $message . ' ' . json_encode($context));
    }

    public function error(\Stringable|string $message, array $context = []): void
    {
        $this->writer->write('[ERROR] ' . $message . ' ' . json_encode($context));
    }

    public function warning(\Stringable|string $message, array $context = []): void
    {
        $this->writer->write('[WARNING] ' . $message . ' ' . json_encode($context));
    }

    public function notice(\Stringable|string $message, array $context = []): void
    {
        $this->writer->write('[NOTICE] ' . $message . ' ' . json_encode($context));
    }

    public function info(\Stringable|string $message, array $context = []): void
    {
        $this->writer->write('[INFO] ' . $message . ' ' . json_encode($context));
    }

    public function debug(\Stringable|string $message, array $context = []): void
    {
        $this->writer->write('[DEBUG] ' . $message . ' ' . json_encode($context));
    }

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