<?php

namespace App\Tests\Unit;

use App\Model\Sum;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SumTest extends KernelTestCase
{
    public function testSums(): void
    {
        self::bootKernel();

        $data = [
            'testAddition' => ['value1' => 10, 'operator' => '+', 'value2' => 20, 'result' => 30],
            'testSubtraction' => ['value1' => 10, 'operator' => '-', 'value2' => 20, 'result' => -10],
            'testDivision' => ['value1' => 10, 'operator' => '/', 'value2' => 20, 'result' => 0.5],
            'testMultiplication' => ['value1' => 10, 'operator' => '*', 'value2' => 20, 'result' => 200],
        ];

        foreach ($data as $set) {
            extract($set);
            $sum = new Sum();
            $sum->value1 = $value1;
            $sum->operator = $operator;
            $sum->value2 = $value2;
            self::assertEquals($result, $sum->getResult());
        }
    }
}
