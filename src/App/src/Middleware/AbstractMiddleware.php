<?php

declare(strict_types=1);

namespace App\Middleware;

use Doctrine\ORM\EntityManager;
use Psr\Http\Server\MiddlewareInterface;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractMiddleware implements MiddlewareInterface
{
    /**
     * @var EntityManager 
     */
    protected $em;

    /**
     * @var Serializer 
     */
    protected $serializer;

    public function __construct(EntityManager $em, Serializer $serializer)
    {
        $this->em         = $em;
        $this->serializer = $serializer;
    }
}
