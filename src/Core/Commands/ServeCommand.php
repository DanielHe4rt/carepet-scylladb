<?php

namespace App\Core\Commands;

class ServeCommand extends AbstractCommand
{

    public function handle(array $args): int
    {
        echo `php -S 0.0.0.0:8000 -t public`;
        return self::SUCCESS;
    }
}