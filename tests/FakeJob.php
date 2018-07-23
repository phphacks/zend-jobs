<?php

namespace Zend\Jobs\Tests;

use Zend\Jobs\Job\JobInterface;

class FakeJob implements JobInterface
{
    public function run():void
    {
        echo 'doingSomething';
    }
}