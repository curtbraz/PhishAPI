<?php
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

function createLogger() : LoggerInterface
{
    // just create and configure any PSR-3 logger of your choice 
    return new NullLogger();
}
