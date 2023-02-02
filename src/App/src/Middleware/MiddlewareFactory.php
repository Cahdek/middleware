<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Container\ContainerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class MiddlewareFactory
{
    public function __invoke(ContainerInterface $container, string $class): AbstractMiddleware
    {
        $em         = $container->get('doctrine.entity_manager.orm_default');
        $serializer = new Serializer(
            [
            new GetSetMethodNormalizer(),
            ], [
            new JsonEncoder(),
            ]
        );
        return new $class($em, $serializer);
    }
}
