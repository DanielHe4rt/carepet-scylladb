<?php

namespace App\Owner\Actions;

use App\Core\Database\Connector;
use App\Owner\OwnerDTO;
use App\Owner\OwnerFactory;
use App\Owner\OwnerRepository;

class CreateOwner
{
    public static function handle(): OwnerDTO
    {
        $ownerDTO = OwnerFactory::make();
        $repository = new OwnerRepository(new Connector(config('database')));
        $repository->create($ownerDTO);
        return $ownerDTO;
    }
}