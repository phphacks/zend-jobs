<?php

namespace Zend\Jobs\Tests;

use Zend\Jobs\Job\JobInterface;

class FakeJobTwo implements JobInterface
{
    public function run():void
    {
        echo 'doingSomething2';
    }
}