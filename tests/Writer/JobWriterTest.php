<?php

namespace Zend\Jobs\Tests\Writer;

use PHPUnit\Framework\TestCase;
use Tightenco\Collect\Support\Collection;
use Zend\Jobs\Tests\FakeJob;
use Zend\Jobs\Writer\JobWriter;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\Application;
use Zend\ServiceManager\ServiceManager;

/**
 * ModuleTest
 *
 * @package Zend\HttpErrors\Tests
 */
class JobWriterTest extends TestCase
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

    public function testIfJobWasAdded()
    {
        $writer = $this->serviceManager->get(JobWriter::class);
        $writer->add(new FakeJob());

        $this->assertEquals(1, count($writer->getJobs()->count()));
    }

    public function testIfGetReturnsCollectionObject()
    {
        $writer = $this->serviceManager->get(JobWriter::class);
        $this->assertInstanceOf(Collection::class, $writer->getJobs());
    }
}