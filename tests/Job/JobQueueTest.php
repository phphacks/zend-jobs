<?php

namespace Zend\Jobs\Tests\Job;

use PHPUnit\Framework\TestCase;
use Tightenco\Collect\Support\Collection;
use Zend\Jobs\Job\JobQueue;
use Zend\Jobs\Reader\JobReader;
use Zend\Jobs\Tests\FakeJob;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\Application;
use Zend\ServiceManager\ServiceManager;

class JobQueueTest extends TestCase
{
    /**
     * @var Application
     */
    private $application;

    /**
     * @var ServiceManager
     */
    private $serviceManager;

    /**
     * @var ModuleManager
     */
    private $moduleManager;

    public function setUp()
    {
        $this->application = Application::init(include __DIR__ . '/../application.config.php');
        $this->serviceManager = $this->application->getServiceManager();
        $this->moduleManager = $this->serviceManager->get('ModuleManager');
    }

    public function testIfJobQueueCanBeInstantiated()
    {
        $jobQueue = new JobQueue();

        $this->assertInstanceOf(JobQueue::class, $jobQueue);
    }

    public function testIfJobReaderCanBeSet()
    {
        $reader = $this->serviceManager->get(JobReader::class);

        $jobQueue = new JobQueue();
        $jobQueue->setJobReader($reader);

        $this->assertInstanceOf(JobReader::class, $jobQueue->getJobReader());
    }

    public function testIfLocateByTypeReturnsCollection()
    {
        $specifiedType = FakeJob::class;
        $reader = $this->serviceManager->get(JobReader::class);

        $jobQueue = new JobQueue();
        $jobQueue->setJobReader($reader);

        $jobs = $jobQueue->locateByType($specifiedType, 3);

        $this->assertInstanceOf(Collection::class, $jobs);
    }

    public function testIfLocateByTypeReturnsOnlySpecifiedType()
    {
        $reader = $this->serviceManager->get(JobReader::class);

        $jobQueue = new JobQueue();
        $jobQueue->setJobReader($reader);

        $jobs = $jobQueue->locateByType(FakeJob::class);

        foreach ($jobs->all() as $job) {
            $this->assertInstanceOf(FakeJob::class, $job);
        }
    }

    public function testIfLocateByTypeRespectsLimitParameter()
    {
        $givenLimit = 2;
        $reader = $this->serviceManager->get(JobReader::class);
        $jobQueue = new JobQueue();
        $jobQueue->setJobReader($reader);
        $jobs = $jobQueue->locateByType(FakeJob::class, $givenLimit);

        $this->assertCount($givenLimit, $jobs->all());
    }
}