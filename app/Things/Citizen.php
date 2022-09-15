<?php

namespace App\Things;

use App\Things\Age;
use App\Things\Creature;

class Citizen
{
    private Age $age;

    public function __construct(
        private string   $name = 'Jake',
        private Creature $creature = Creature::Raven,
                         $years = 2
    )
    {
        $this->age = Age::fromYears($years);
    }

    public function __toString(): string
    {
        return "{$this->creature->value} {$this->name} is {$this->age->years()}";
    }
}
