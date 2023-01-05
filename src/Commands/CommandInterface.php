<?php
namespace App\Commands;

interface CommandInterface
{
    public function handle(array $args): int;
}