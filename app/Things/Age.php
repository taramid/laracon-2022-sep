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

    public static function fromHours(int $hours): self
    {
        return self::fromSeconds($hours * self::SECONDS_IN_AN_HOUR);
    }

    public static function fromDays(int $days): self
    {
        return self::fromHours($days * self::HOURS_IN_A_DAY);
    }

    public static function fromYears(int $years): self
    {
        return self::fromDays($years * self::DAYS_IN_YEAR);
    }

    public function seconds(): int
    {
        return $this->seconds;
    }

    public function hours(): int
    {
        return $this->seconds / self::SECONDS_IN_AN_HOUR;
    }

    public function days(): float
    {
        return $this->hours() / self::HOURS_IN_A_DAY;
    }

    public function years(): float
    {
        return $this->days() / self::DAYS_IN_YEAR;
    }

    public function __toString(): string
    {
        return <<<HTML
            {$this->seconds()} second(s)
            <br>
            {$this->days()} days(s)
            <br>
            {$this->years()} years(s)
HTML;
    }
}
