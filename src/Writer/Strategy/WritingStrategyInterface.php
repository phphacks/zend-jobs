<?php

namespace Zend\Jobs\Writer\Strategy;

interface WritingStrategyInterface
{
    public function write(array $jobs);
}