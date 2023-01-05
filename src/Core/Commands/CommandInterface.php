<?php
namespace App\Core\Commands;

interface CommandInterface
{
    public function handle(array $args): int;
}