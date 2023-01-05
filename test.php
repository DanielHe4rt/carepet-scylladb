<?php

use App\Owner\OwnerCollection;
use App\Owner\OwnerRepository;
use App\Pet\PetCollection;
use App\Pet\PetDTO;
use App\Pet\PetRepository;

require_once 'vendor/autoload.php';

$ownerRepository = new OwnerRepository();
$petRepository = new PetRepository();

$ownerCollection = OwnerCollection::make($ownerRepository->all());
$petCollection = PetCollection::make($petRepository->all());



$petDTO = new PetDTO(
    $ownerCollection[0]->id,
    'dasdas',
    'blue',
    'caramelo',
    'dog',
    'male',
    1,
    1.23,
    'rua foda',
    'doguinho'
);

//$petRepository->create($petDTO);