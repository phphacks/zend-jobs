<?php

use Zend\Jobs\Writer\JobWriter;
use Zend\Jobs\Writer\JobWriterFactory;
use Zend\Jobs\Reader\JobReader;
use Zend\Jobs\Reader\JobReaderFactory;

return [
    'service_manager' => [
        'factories' => [
            JobWriter::class => JobWriterFactory::class,
            JobReader::class => JobReaderFactory::class
        ]
    ]
];