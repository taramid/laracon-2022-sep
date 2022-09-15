<?php

namespace App\Things;

use http\Exception\InvalidArgumentException;

class Age
{
    const
        SECONDS_IN_AN_HOUR = 3600,
        HOURS_IN_A_DAY = 24,
        DAYS_IN_YEAR = 365;

    private function __construct(
        private readonly int $seconds = 0
    )
    {
        if (0 > $this->seconds) {
            throw new InvalidArgumentException();
        }
    }

    public static function fromSeconds(int $seconds): self
    {
        return new self($seconds);
    }

    public static function fromDays(int $days): self
    {
        return new self($days * self::HOURS_IN_A_DAY * self::SECONDS_IN_AN_HOUR);
    }

    public static function fromYears(int $years): self
    {
        return new self($years * self::DAYS_IN_YEAR * self::HOURS_IN_A_DAY * self::SECONDS_IN_AN_HOUR);
    }

    public function seconds(): int
    {
        return $this->seconds;
    }

    public function days(): float
    {
        return $this->seconds / self::SECONDS_IN_AN_HOUR / self::HOURS_IN_A_DAY;
    }

    public function years(): float
    {
        return $this->seconds / self::SECONDS_IN_AN_HOUR / self::HOURS_IN_A_DAY / self::DAYS_IN_YEAR;
    }

    public function tell(): string
    {
        return $this->seconds() . ' second(s). What is ' . $this->days() . ' day(s). What is ' . $this->years() . ' year(s)';
    }
}
