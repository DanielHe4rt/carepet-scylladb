<?php
require_once 'vendor/autoload.php';


use App\Owner\OwnerCollection;
use App\Owner\OwnerRepository;
use App\Pet\PetCollection;
use App\Pet\PetDTO;
use App\Pet\PetRepository;


$ownerDTO = new \App\Owner\OwnerDTO('daniel', 'vai', new \Cassandra\Uuid('dasdas'));

$ownerRepository = new OwnerRepository();

$ownerRepository->all();

$ownerCollection = OwnerCollection::make($ownerRepository->all());

