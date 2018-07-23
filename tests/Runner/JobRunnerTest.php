<?php

namespace Zend\Jobs\Tests\Runner;

use Zend\Jobs\Tests\FakeJob;
use Zend\Jobs\Runner\JobRunner;
use Zend\Jobs\Writer\JobWriter;
use Zend\Mvc\Application;
use Zend\ModuleManager\ModuleManager;
use Zend\ServiceManager\ServiceManager;

class JobRunnerTest extends \PHPUnit\Framework\TestCase
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

    public function testCanRunJobs()
    {
        $writer = $this->serviceManager->get(JobWriter::class);
        $writer->add(new FakeJob());

        $jobRunner = new JobRunner();
        $jobRunner->setJobs($writer->getJobs());

        $this->expectOutputString("doingSomething", $jobRunner->run());
    }
}

