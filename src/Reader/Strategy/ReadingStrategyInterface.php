<?php

namespace Zend\Jobs\Reader\Strategy;

use Tightenco\Collect\Support\Collection;

interface ReadingStrategyInterface
{
    public function read():Collection;
}