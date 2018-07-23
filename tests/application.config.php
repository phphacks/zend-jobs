<?php

use Zend\Jobs\Writer\Strategy\WritingStrategyInterface;
use Zend\Jobs\Tests\FakeWriterStrategy;
use Zend\Jobs\Reader\Strategy\ReadingStrategyInterface;
use Zend\Jobs\Tests\FakeReaderStrategy;

return [
    'modules' => [
        'Zend\Router',
        'Zend\Jobs'
    ],
    'module_listener_options' => [],
    'service_manager' => [
        'invokables' => [
            WritingStrategyInterface::class => FakeWriterStrategy::class,
            ReadingStrategyInterface::class => FakeReaderStrategy::class
        ]
    ]
];