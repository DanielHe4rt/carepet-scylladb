<?php

namespace App\Core\Entities;

use App\Core\Interfaces\FactoryContract;

abstract class AbstractFactory
{
    public abstract static function make(array $fields = []);

    public abstract static function makeMany(int $amount, array $fields = []);

}