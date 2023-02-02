<?php

/**
 * AbstractHandler as base for ALL Handlers
 */

declare(strict_types=1);

namespace App\Handler;

use Doctrine\ORM\EntityManager;
use Psr\Http\Server\RequestHandlerInterface;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractHandler implements RequestHandlerInterface
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
