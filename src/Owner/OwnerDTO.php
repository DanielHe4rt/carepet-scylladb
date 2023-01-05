<?php

namespace App\Owner;

use App\Core\AbstractDTO;
use Cassandra\Uuid;

class OwnerDTO extends AbstractDTO
{
    /** @var Uuid $id */
    public $id;

    /** @var string $name */
    public $name;

    /** @var string $address */
    public $address;

    public function __construct(Uuid $id, string $name, string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    public function make(array $payload): AbstractDTO
    {
        return new self($payload['owner_id'], $payload['name'], $payload['address']);
    }

    public function toDatabase(): array
    {
        return [
            'name' => $this->name,
            'address' => $this->address
        ];
    }
}