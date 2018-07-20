<?php

namespace Zend\Jobs\Writer;

use Interop\Container\ContainerInterface;
use Zend\Jobs\Writer\Strategy\WritingStrategyInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class JobWriterFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|JobWriter
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $strategy = $container->get(WritingStrategyInterface::class);
        return new JobWriter($strategy);
    }
}