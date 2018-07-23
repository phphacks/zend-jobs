<?php

namespace Zend\Jobs\Writer\Strategy;

use Tightenco\Collect\Support\Collection;

interface WritingStrategyInterface
{
    public function write(Collection $jobs);
}