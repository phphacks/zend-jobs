<?php

namespace Zend\Jobs\Reader;

use Tightenco\Collect\Support\Collection;
use Zend\Jobs\Reader\Strategy\ReadingStrategyInterface;

class JobReader
{
    /**
     * @var ReadingStrategyInterface
     */
    private $strategy;

    public function __construct(ReadingStrategyInterface $readingStrategy)
    {
        $this->strategy = $readingStrategy;
    }

    public function read():Collection
    {
        return $this->strategy->read();
    }
}