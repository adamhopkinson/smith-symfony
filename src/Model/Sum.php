<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class Sum
{
    #[Assert\NotBlank]
    public float $value1;

    #[Assert\NotBlank]
    public float $value2;

    #[Assert\NotBlank]
    #[Assert\Choice(
        choices: ['+', '-', '/', '*'],
        message: 'The operator field is required.'
    )]
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

    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context): void
    {
        if ('/' == $this->operator && 0 == $this->value2) {
            $context->buildViolation('Please avoid dividing by zero!')
                ->atPath('value2')
                ->addViolation();
        }
    }
}
