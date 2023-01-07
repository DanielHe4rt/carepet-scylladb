<?php

namespace App\Core\Entities;

use ArrayIterator;
use JsonSerializable;

abstract class Collection extends ArrayIterator implements JsonSerializable
{

    public function jsonSerialize(): array
    {
        return [
            'data' => $this->getArrayCopy()
        ];
    }


}