<?php

require_once 'vendor/autoload.php';


$repository = new \App\Owner\OwnerRepository();

$result = $repository->getById(1);

dump($result);