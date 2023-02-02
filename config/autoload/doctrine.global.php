<?php

declare(strict_types=1);

use Doctrine\Migrations\Configuration\Migration\ConfigurationLoader;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Tools\Console\Command;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Persistence\Mapping\Driver\MappingDriverChain;
use Roave\PsrContainerDoctrine\ConfigurationLoaderFactory;
use Roave\PsrContainerDoctrine\EntityManagerFactory;
use Roave\PsrContainerDoctrine\Migrations\CommandFactory;
use Roave\PsrContainerDoctrine\Migrations\DependencyFactoryFactory;

return [
    'doctrine'     => [
        'connection' => [
            'orm_default' => [
                'driver_class' => Doctrine\DBAL\Driver\PDO\MySQL\Driver::class,
                'params'       => [
                    'host'     => '<dbhost>',
                    'port'     => '3306',
                    'user'     => '<username>',
                    'password' => '<password>',
                ],
            ],
        ],
        'driver'     => [
            'orm_default'  => [
                'class'   => MappingDriverChain::class,
                'drivers' => ['App\Entity' => 'app_entities'],
            ],
            'app_entities' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => __DIR__ . '/../../src/',
            ],
        ],
    ],
    'dependencies' => [
        'factories' => [
            Command\CurrentCommand::class         => CommandFactory::class,
            Command\DiffCommand::class            => CommandFactory::class,
            Command\DumpSchemaCommand::class      => CommandFactory::class,
            Command\ExecuteCommand::class         => CommandFactory::class,
            Command\GenerateCommand::class        => CommandFactory::class,
            Command\LatestCommand::class          => CommandFactory::class,
            Command\ListCommand::class            => CommandFactory::class,
            Command\MigrateCommand::class         => CommandFactory::class,
            Command\RollupCommand::class          => CommandFactory::class,
            Command\SyncMetadataCommand::class    => CommandFactory::class,
            Command\StatusCommand::class          => CommandFactory::class,
            Command\UpToDateCommand::class        => CommandFactory::class,
            Command\VersionCommand::class         => CommandFactory::class,
            DependencyFactory::class              => DependencyFactoryFactory::class,
            ConfigurationLoader::class            => ConfigurationLoaderFactory::class,
            'doctrine.entity_manager.orm_default' => EntityManagerFactory::class,
        ],
    ],
];

/**
* switch out the user and password with the correct connection string
* note that the my_entity driver you specified  is looking for entities written in xml files
* for entities written in php use the Annotation Driver (see full config)
*/
