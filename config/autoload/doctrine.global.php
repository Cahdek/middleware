<?php

declare(strict_types=1);

use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\ChainCache;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\Common\Cache\MemcacheCache;
use Doctrine\Common\Cache\MemcachedCache;
use Doctrine\Common\Cache\PhpFileCache;
use Doctrine\Common\Cache\RedisCache;
use Doctrine\DBAL\Driver\PDO\MySQL\Driver;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Persistence\Mapping\Driver\MappingDriverChain;
use Roave\PsrContainerDoctrine\EntityManagerFactory;

return [
    'doctrine'     => [
        'configuration' => [
            'orm_default' => [
                'result_cache'                => 'filesystem',
                'metadata_cache'              => 'filesystem',
                'query_cache'                 => 'filesystem',
                'hydration_cache'             => 'filesystem',
                'auto_generate_proxy_classes' => false,
                'proxy_dir'                   => '/../../data/cache/DoctrineEntityProxy',
                'proxy_namespace'             => 'DoctrineEntityProxy',
                'entity_namespaces'           => [
                    'App\Entity',
                ],
                // 'datetime_functions'            => [],
                // 'string_functions'              => [],
                // 'numeric_functions'             => [],
                // 'filters'                       => [],
                // 'named_queries'                 => [],
                // 'named_native_queries'          => [],
                // 'custom_hydration_modes'        => [],
                // 'naming_strategy'               => null,
                // 'quote_strategy'                => null,
                // 'default_repository_class_name' => null,
                // 'repository_factory'            => null,
                // 'class_metadata_factory_name'   => null,
                // 'entity_listener_resolver'      => null,
                // 'second_level_cache'            => [
                //     'enabled'                    => false,
                //     'default_lifetime'           => 3600,
                //     'default_lock_lifetime'      => 60,
                //     'file_lock_region_directory' => '',
                //     'regions'                    => [],
                // ],
                // 'sql_logger'                    => null,
                // 'middlewares'                   => [
                    // List of middlewares doctrine will use to decorate the `Driver` component.
                    // (see https://github.com/doctrine/dbal/blob/3.3.2/docs/en/reference/architecture.rst#middlewares)
                //],
            ],
        ],
        'connection'    => [
            'orm_default' => [
                'driver_class' => Driver::class,
                'params'       => [
                    'host'     => '<host>',
                    'port'     => '<port>',
                    'user'     => '<user>',
                    'password' => '<pass>',
                ],
                // 'wrapper_class'            => null,
                // 'pdo'                      => null,
                // 'doctrine_mapping_types'   => [],
                // 'doctrine_commented_types' => [],
            ],
        ],
        // 'entity_manager' => [
        //     'orm_default' => [],
        // ],
        // 'event_manager'  => [
        //     'orm_default' => [
        //         'subscribers' => [],
        //         'listeners'   => [],
        //     ],
        // ],
        'driver' => [
            'orm_default' => [
                'class'     => MappingDriverChain::class,
                'paths'     => [],
                'extension' => null,
                'drivers'   => [
                    'App\Entity' => 'app_entity',
                ],
                // 'global_basename' => null,
                // 'default_driver'  => null,
            ],
            'app_entity'  => [
                'class' => AnnotationDriver::class,
                'cache' => 'filesystem',
                'paths' => [
                    __DIR__ . '/../../src/',
                ],
            ],
        ],
        'cache'  => [
            'apcu'       => [
                'class'     => ApcuCache::class,
                'namespace' => 'psr-container-doctrine',
            ],
            'array'      => [
                'class'     => ArrayCache::class,
                'namespace' => 'psr-container-doctrine',
            ],
            'filesystem' => [
                'class'     => FilesystemCache::class,
                'directory' => 'data/cache/doctrine',
                'namespace' => 'app',
            ],
            'memcache'   => [
                'class'     => MemcacheCache::class,
                'instance'  => 'my_memcache_alias',
                'namespace' => 'psr-container-doctrine',
            ],
            'memcached'  => [
                'class'     => MemcachedCache::class,
                'instance'  => 'my_memcached_alias',
                'namespace' => 'psr-container-doctrine',
            ],
            'phpfile'    => [
                'class'     => PhpFileCache::class,
                'directory' => 'data/cache/DoctrineCache',
                'namespace' => 'psr-container-doctrine',
            ],
            'redis'      => [
                'class'     => RedisCache::class,
                'instance'  => 'my_redis_alias',
                'namespace' => 'psr-container-doctrine',
            ],
            'chain'      => [
                'class'     => ChainCache::class,
                'providers' => ['array', 'redis'], // you can use any provider listed above
                'namespace' => 'psr-container-doctrine', // will be applied to all providers in the chain
            ],
        ],
        // 'types'          => [],
    ],
    'dependencies' => [
        'factories' => [
            'doctrine.entity_manager.orm_default' => EntityManagerFactory::class,
        ],
    ],
];
