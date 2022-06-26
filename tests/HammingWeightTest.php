<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function Src\HammingWeight\HammingWeight\hammingWeight;

class HammingWeightTest extends TestCase
{
    /**
     * @dataProvider hammingWeightDataProvider
     */
    public function testHammingWeight($expected, $actual): void
    {
        $this->assertEquals($expected, hammingWeight($actual));
    }

    public function hammingWeightDataProvider(): array
    {
        return [
            [0, 0],
            [1, 1],
            [2, 5],
            [2, 10],
            [4, 101],
            [6, 12345]
        ];
    }
}
