<?php

namespace App\Things;

class Simple
{
    public function __construct(
        private readonly int $from = 1,
        private readonly int $to = 101
    )
    {}

    public function get(): \Generator
    {
        for ($i = $this->from; $i <= $this->to; ++$i) {
            if ($this->isItSimple($i)) {
                yield $i;
            }
        }
    }

    private function isItSimple(int $number): bool
    {
        for ($i = 2; $i < $number; ++$i) {
            if (0 == $number % $i) {
                return false;
            }
        }
        return true;
    }
}
