<?php

namespace App\Core\Commands;

use App\Core\Commands\Base\AbstractCommand;
use App\Owner\OwnerDTO;
use App\Owner\OwnerFactory;
use App\Owner\OwnerRepository;
use App\Pet\PetFactory;
use App\Pet\PetRepository;

class SeedCommand extends AbstractCommand
{

    const AMOUNT_BASE = 50;
    public function handle(array $args): int
    {
        $ownerRepository = new OwnerRepository();
        $petRepository = new PetRepository();


        for ($i = 0; $i <= self::AMOUNT_BASE; $i++) {
            var_dump($ownerRepository->create(OwnerFactory::make()));
//            $ownerDTO = OwnerDTO::make();
//            $petRepository->create(PetFactory::make(['owner_id' => $ownerDTO->id]));
        }

        while (true) {



            sleep(1);
        }
    }
}