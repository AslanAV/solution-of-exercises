<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function Brackets\Brackets\isBalanced;

class IsBalancedTest extends TestCase
{
    /**
     * @dataProvider isBalancedTrueDataProvider
     * */
    public function testIsBalancedTrue($str): void
    {
        $this->assertTrue(isBalanced($str));
    }

    /**
     * @dataProvider isBalancedFalseDataProvider
     * */
    public function testIsBalancedFalse($str): void
    {
        $this->assertFalse(isBalanced($str));
    }


    public function isBalancedTrueDataProvider(): array
    {
        return [
            ['()'],
            ['(())'],
            ['(()((((())))))'],
            ['']
        ];
    }

    protected function isBalancedFalseDataProvider(): array
    {
        return [
            ['(('],
            ['())('],
            ['((())'],
            ['(())())'],
            ['(()(()))))'],
            [')'],
            ['())(()']
        ];
    }
}
