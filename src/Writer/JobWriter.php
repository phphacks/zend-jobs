<?php

namespace Zend\Jobs\Writer;

use Tightenco\Collect\Support\Collection;
use Zend\Jobs\Job\JobInterface;
use Zend\Jobs\Writer\Strategy\WritingStrategyInterface;

class JobWriter
{
    /**
     * @var WritingStrategyInterface
     */
    private $strategy;

    /**
     * @var Collection
     */
    private $jobs;

    public function __construct(WritingStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
        $this->jobs = new Collection();
    }

    public function getJobs()
    {
        return $this->jobs;
    }

    public function add(JobInterface $job)
    {
        $this->jobs->push($job);
    }

    public function save()
    {
        $this->strategy->write($this->jobs);
    }
}