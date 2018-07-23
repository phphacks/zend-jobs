<?php

namespace Zend\Jobs\Tests;

use PHPUnit\Framework\TestCase;
use Zend\Jobs\Reader\JobReader;
use Zend\Jobs\Writer\JobWriter;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\Application;
use Zend\ServiceManager\ServiceManager;

/**
 * ModuleTest
 *
 * @package Zend\HttpErrors\Tests
 */
class ModuleTest extends TestCase
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
        $this->application = Application::init(include __DIR__ . '/application.config.php');
        $this->serviceManager = $this->application->getServiceManager();
        $this->moduleManager = $this->serviceManager->get('ModuleManager');
    }

    public function testIfModuleWasCreated()
    {
        $this->assertArrayHasKey('Zend\Jobs', $this->moduleManager->getLoadedModules());
    }

    public function testIfJobWriterIsAvailable()
    {
        $writer = $this->serviceManager->get(JobWriter::class);
        $this->assertInstanceOf(JobWriter::class, $writer);
    }

    public function testIfJobReaderIsAvailable()
    {
        $reader = $this->serviceManager->get(JobReader::class);
        $this->assertInstanceOf(JobReader::class, $reader);
    }
}