<?php

/**
 * AbstractHandlerFactory as Factory for all handlers
 */

declare(strict_types=1);

namespace App\Handler;

use Psr\Container\ContainerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class HandlerFactory
{
    public function __invoke(ContainerInterface $container, string $class): AbstractHandler
    {
        $em         = $container->get('doctrine.entity_manager.orm_default');
        $serializer = new Serializer(
            [
                new GetSetMethodNormalizer(),
            ],
            [
                new JsonEncoder(),
            ]
        );
        return new $class($em, $serializer);
    }
}
