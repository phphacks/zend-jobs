<?php

namespace Zend\Jobs\Tests\Reader;

use PHPUnit\Framework\TestCase;
use Tightenco\Collect\Support\Collection;
use Zend\Jobs\Tests\FakeJob;
use Zend\Jobs\Reader\JobReader;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\Application;
use Zend\ServiceManager\ServiceManager;

class JobReaderTest extends TestCase
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

    public function testIfReadReturnsCollection()
    {
        $jobReader = $this->serviceManager->get(JobReader::class);
        $this->assertInstanceOf(Collection::class, $jobReader->read());
    }
}