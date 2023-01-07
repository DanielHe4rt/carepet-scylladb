<?php

namespace App\Sensor;

use App\Core\Entities\AbstractFactory;
use App\Pet\PetDTO;
use App\Sensor\Type\TypeFactory;
use Cassandra\Uuid;
use Faker\Factory;

class SensorFactory extends AbstractFactory
{
    public static function make(array $fields = []): SensorDTO
    {
        $faker = Factory::create();

        return new SensorDTO(
            $fields['owner_id'] ?? new Uuid($faker->uuid()),
            $fields['pet_id'] ?? new Uuid($faker->uuid()),
            $fields['type'] ?? TypeFactory::make()
        );
    }

    public static function makeMany(int $amount, array $fields = []): SensorCollection
    {
        $collection = array_fill(0, $amount, self::make($fields));
        return new SensorCollection($collection);
    }

}