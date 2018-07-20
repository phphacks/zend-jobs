<?php

namespace Zend\Jobs\Job;

interface JobInterface
{
    public function run(): void;
}