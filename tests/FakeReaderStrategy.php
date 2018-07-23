<?php

namespace Zend\Jobs\Tests;

use Tightenco\Collect\Support\Collection;
use Zend\Jobs\Reader\Strategy\ReadingStrategyInterface;
use Zend\Jobs\Tests\FakeJob;
use Zend\Jobs\Tests\FakeJobTwo;

class FakeReaderStrategy implements ReadingStrategyInterface
{
    public function read():Collection
    {
        $jobs = [
            new FakeJob(),
            new FakeJob(),
            new FakeJob(),
            new FakeJob(),
            new FakeJobTwo(),
            new FakeJobTwo()
        ];

        return new Collection($jobs);
    }
}