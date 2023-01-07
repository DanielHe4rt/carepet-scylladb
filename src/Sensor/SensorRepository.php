<?php

namespace App\Sensor;

use App\Core\Database\AbstractRepository;

class SensorRepository extends AbstractRepository
{
    /** @var string */
    public $table = 'sensor';

    /** @var string */
    public $primaryKey = 'sensor_id';
}