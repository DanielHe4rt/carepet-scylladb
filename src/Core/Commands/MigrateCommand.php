<?php

namespace App\Core\Commands;

use App\Core\Database\Connector;

class MigrateCommand extends AbstractCommand
{

    public function handle(array $args): int
    {
        $config = ['nodes' => 'carepet-scylla1', 'keyspace' => ''];
        $connector = new Connector($config);

        $keyspaceCQL = file_get_contents(basePath('/migrations/1-create_keyspace.cql'));
        $connector->prepare($keyspaceCQL)->execute();

        $connector = $connector
            ->setKeyspace('carepet');

        foreach (glob(basePath('/migrations/*.cql')) as $migrationFile) {
            $connector->prepare(file_get_contents($migrationFile))->execute();
        }

        return self::SUCCESS;
    }
}