<?php

namespace App\Owner\Actions;

use App\Core\Database\Connector;
use App\Owner\OwnerDTO;
use App\Owner\OwnerRepository;
use Exception;

class GetOwnerById
{
    public static function handle(string $ownerId)
    {
        $repository = new OwnerRepository(new Connector(config('database')));
        $row = $repository->getById($ownerId);

        if(!$row->count()) {
            throw new Exception('dasdas');
        }

        return OwnerDTO::make($row->first());
    }
}