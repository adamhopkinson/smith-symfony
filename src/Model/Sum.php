<?php

namespace App\Model;

class Sum
{
    public float $value1;
    public float $value2;
    public string $operator;

    public function getResult(): float
    {
        return match ($this->operator) {
            '+' => $this->value1 + $this->value2,
            '-' => $this->value1 - $this->value2,
            '/' => $this->value1 / $this->value2,
            '*' => $this->value1 * $this->value2,
        };
    }
}
