<?php

namespace Zend\Jobs\Tests;

use Zend\Jobs\Writer\Strategy\WritingStrategyInterface;

class FakeWriterStrategy implements WritingStrategyInterface
{
    public function write(array $jobs)
    {
        return true;
    }
}