<?php
return [
    'table_storage' => [
        'table_name' => 'doctrine_migration_versions',
        'version_column_name' => 'version',
        'version_column_length' => 1024,
        'executed_at_column_name' => 'executed_at'
    ],
    'migrations_paths' => [
        'App\Migrations' => '/data/doctrine/migrations'
    ],
    'all_or_nothing' => true,
    'check_database_platform' => true
];