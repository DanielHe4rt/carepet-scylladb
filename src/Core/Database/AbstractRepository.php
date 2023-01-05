<?php

namespace App\Core\Database;

use App\Core\AbstractDTO;
use App\Owner\OwnerDTO;
use Cassandra\FutureRows;

abstract class AbstractRepository
{

    public $table = '';

    /**
     * @var Connector
     */
    public $connection;

    public function __construct()
    {
        $this->connection = new Connector();
    }

    public function getById(string $id): FutureRows
    {
        return $this->connection
            ->prepare(sprintf('SELECT * FROM %s WHERE id = %s', $this->table, $id))
            ->execute();
    }
}