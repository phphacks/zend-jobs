<?php

namespace Zend\Jobs\Writer;

use Zend\Jobs\Job\JobInterface;
use Zend\Jobs\Writer\Strategy\WritingStrategyInterface;

class JobWriter
{
    private $strategy;
    private $jobs = [];

    public function __construct(WritingStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function add(JobInterface $job)
    {
        $this->jobs[] = $job;
    }

    public function save()
    {
        $this->strategy->write($this->jobs);
    }
}