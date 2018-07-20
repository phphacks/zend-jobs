<?php

use Zend\Jobs\Writer\JobWriter;
use Zend\Jobs\Writer\JobWriterFactory;

return [
    'service_manager' => [
        'factories' => [
            JobWriter::class => JobWriterFactory::class
        ]
    ]
];