<?php

namespace Zend\Jobs\Job;

use Tightenco\Collect\Support\Collection;
use Zend\Jobs\Reader\JobReader;

class JobQueue
{
    /**
     * @var JobReader
     */
    private $jobReader;

    private $type;

    public function setJobReader(JobReader $jobReader)
    {
        $this->jobReader = $jobReader;
    }

    public function getJobReader():JobReader
    {
        return $this->jobReader;
    }

    public function locateByType($type, $limit=null):Collection
    {
        $this->type = $type;
        $jobCollection = $this->jobReader->read();

        $jobCollection = $jobCollection->filter(function ($item){
            if ($item instanceof $this->type) {
                return $item;
            }
        });

        if (empty($limit)) {
            return $jobCollection;
        }

        return $jobCollection->slice(0, $limit);
    }
}