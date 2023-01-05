<?php

namespace App\Core;

use Cassandra\Uuid;

abstract class AbstractDTO
{
    /** @var Uuid $id */
    public $id;

    public abstract function make(array $payload): self;

    public abstract function toDatabase(): array;
}