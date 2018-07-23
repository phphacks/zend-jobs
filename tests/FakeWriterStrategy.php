<?php

namespace Zend\Jobs\Tests;

use Tightenco\Collect\Support\Collection;
use Zend\Jobs\Writer\Strategy\WritingStrategyInterface;

class FakeWriterStrategy implements WritingStrategyInterface
{
    public function write(Collection $jobs)
    {
        return true;
    }
}