<?php

use Zend\Jobs\Writer\Strategy\WritingStrategyInterface;
use Zend\Jobs\Tests\FakeWriterStrategy;

return [
    'modules' => [
        'Zend\Router',
        'Zend\Jobs'
    ],
    'module_listener_options' => [],
    'service_manager' => [
        'invokables' => [
            WritingStrategyInterface::class => FakeWriterStrategy::class
        ]
    ]
];