<?php

namespace App\Core\Commands;

abstract class AbstractCommand implements CommandInterface
{
    const SUCCESS = 0;
    const FAIL = 1;
}