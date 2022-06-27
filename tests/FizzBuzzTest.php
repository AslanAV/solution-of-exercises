<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function FizzBuzz\Fizzbuzz\fizzBuzz;

class FizzBuzzTest extends TestCase
{
    /**
     * @dataProvider fizzBuzzProvider
     */
    public function testFizzBuzz($begin, $end, $expected): void
    {
        $outString = count($expected) !== 0 ?  implode(' ', $expected) : '';
        $this->expectOutputString($outString);
        fizzBuzz($begin, $end);
    }

    private function fizzBuzzProvider()
    {
        return [
            [1, 2, [1, 2]],
            [3, 10, ['Fizz', 4, 'Buzz', 'Fizz', 7, 8, 'Fizz', 'Buzz']],
            [8, 20, [8, 'Fizz', 'Buzz', 11, 'Fizz', 13, 14, 'FizzBuzz', 16, 17, 'Fizz', 19, 'Buzz']],
            [10, 2, []],
            [10, 10, ['Buzz']]

        ];
    }
}
