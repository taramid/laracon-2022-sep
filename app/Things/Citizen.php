<?php

namespace App\Things;

use App\Things\Age;
use App\Things\Creature;
use App\Things\Critter;

class Citizen
{
    private Age $age;

    public function __construct(
        private string   $name = 'Jake',
        private string $critter = Critter::RAVEN,
                         $years = 2
    )
    {
        $this->age = Age::fromYears($years);
    }

    public function __toString(): string
    {
        return "{$this->critter} {$this->name} is {$this->age->years()}";
    }
}
