<?php
declare(strict_types = 1);

use Doctrine\DBAL\Driver\PDO\MySQL\Driver as PDOMySQLDriver;
use Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driver_class' => PDOMySQLDriver::class,
                'params' => [
                    'host' => '<database-server>',
                    'dbname' => '<database>',
                    'user' => '<username>',
                    'password' => '<password>',
                    'port' => '3306'
                ]
            ]
        ],
        'driver' => [
            'orm_default' => [
                'class' => MappingDriverChain::class,
                'drivers' => [
                    'App\Entity' => 'application_entities'
                ]
            ],
            'application_entities' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../../src/'
                ]
            ]
        ]
    ]
];

/**
* switch out the user and password with the correct connection string
* note that the my_entity driver you specified  is looking for entities written in xml files
* for entities written in php use the Annotation Driver (see full config)
*/
