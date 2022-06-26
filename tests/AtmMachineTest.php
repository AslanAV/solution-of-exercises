<?php

namespace Tests;

use function Src\AtmMachine\CashMin\getCashMin;
use function Src\AtmMachine\CashMax\getCashMax;
use PHPUnit\Framework\TestCase;

class AtmMachineTest extends TestCase
{
    private array $cashMachineData = [];

    protected function setUp(): void
    {
        $this->cashMachineData = [
            5000 => 5,
            1000 => 3,
            500 => 3,
            100 => 1,
            50 => 10,
        ];
    }

    /**
     * @dataProvider cashMaxDataProvider
     */
    public function testCashMax($actual, $expected): void
    {
        $this->assertEquals($expected, getCashMax($actual, $this->cashMachineData));
    }

    /**
     * @dataProvider cashMinDataProvider
     */
    public function testCashMin($actual, $expected): void
    {
        $this->assertEquals($expected, getCashMin($actual, $this->cashMachineData));
    }


    protected function cashMaxDataProvider(): array
    {
        return [
            [-750, ['Сумма меньше 0']],
            [351, ['Сумма не кратна']],
            [104500, ['Сумма недостаточна']],
            [150, [50 => 1, 100 => 1, 500 => 0, 1000 => 0, 5000 => 0]],
            [750 , [50 => 3, 100 => 1, 500 => 1, 1000 => 0, 5000 => 0]],
            [3500, [50 => 0, 100 => 0, 500 => 1, 1000 => 3, 5000 => 0]]
        ];
    }

    public function cashMinDataProvider(): array
    {
        return [
            [-750, ['Сумма меньше 0']],
            [351, ['Сумма не кратна']],
            [104500, ['Сумма недостаточна']],
            [150, [50 => 3, 100 => 0, 500 => 0, 1000 => 0, 5000 => 0]],
            [750 , [50 => 5, 100 => 0, 500 => 1, 1000 => 0, 5000 => 0]],
            [3500, [50 => 10, 100 => 0, 500 => 2, 1000 => 2, 5000 => 0]]
        ];
    }
}
