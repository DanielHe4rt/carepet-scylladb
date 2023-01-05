<?php

namespace App\Core\Database;

use Cassandra;
use Cassandra\FutureRows;
use Cassandra\Session;
use Cassandra\SimpleStatement;

class Connector
{
    /**
     * @var Session
     */
    public $cluster;

    public $session;

    /** @var SimpleStatement */
    public $query;

    public function __construct(array $config = ['nodes' => 'carepet-scylla1', 'keyspace' => 'carepet'])
    {
        $this->cluster = Cassandra::cluster()
            ->withContactPoints($config['nodes'])
            ->withPort(9042)
            ->build();

        $this->session = $this->cluster->connect($config['keyspace']);
    }

    public function setKeyspace(string $keyspace = ''): self
    {
        $this->session->close(10);
        $this->session = $this->cluster->connect($keyspace);

        return $this;
    }

    public function prepare(string $query): self
    {
        $this->query = new SimpleStatement($query);

        return $this;
    }

    public function execute(): FutureRows
    {
        return $this->session->executeAsync($this->query, []);
    }
}