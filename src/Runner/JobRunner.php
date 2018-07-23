<?php

namespace Zend\Jobs\Runner;

use Tightenco\Collect\Support\Collection;

class JobRunner
{
    /**
     * @var Collection
     */
    private $jobs;

    private $callback;

    public function setJobs(Collection $jobs)
    {
        $this->jobs = $jobs;
    }

    public function run():void
    {
        foreach ($this->jobs->all() as $job) {
            $job->run();
        }
    }
}