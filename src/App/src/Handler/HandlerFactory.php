<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Container\ContainerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class HandlerFactory
{
    /**
     * @param string $class
     * @return AbstractHandler
     */
    public function __invoke(ContainerInterface $container, $class)
    {
        $serializer = new Serializer([
            new GetSetMethodNormalizer(null, null, null, null, null, [
                AbstractNormalizer::IGNORED_ATTRIBUTES => [
                    'created',
                    'modified',
                ],
            ]),
        ], [
            new JsonEncoder(),
        ]);
        $em         = $container->get('doctrine.entity_manager.orm_default');

        return new $class($em, $serializer);
    }
}
