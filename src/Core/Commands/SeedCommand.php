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
            $ownerDTO = OwnerFactory::make();
            $petDTO =  PetFactory::make(['owner_id' => $ownerDTO->id]);

            $ownerRepository->create($ownerDTO);
            $this->info(sprintf('Owner %s', $ownerDTO->id));

            $petRepository->create($petDTO);
            $this->info(sprintf('Pet: %s | Owner %s', $petDTO->id, $petDTO->ownerId));
        }

        while (true) {



            sleep(1);
        }
    }
}