<?php

namespace Zend\Jobs\Reader;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Jobs\Reader\Strategy\ReadingStrategyInterface;

class JobReaderFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|JobReader
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $strategy = $container->get(ReadingStrategyInterface::class);
        return new JobReader($strategy);
    }
}