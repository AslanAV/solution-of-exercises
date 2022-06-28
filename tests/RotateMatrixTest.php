<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function RotateMatrix\RotateMatrix\rotateLeft;
use function RotateMatrix\RotateMatrix\rotateRight;

class RotateMatrixTest extends TestCase
{
    public function testRotate(): void
    {
        $matrix = [
            [1, 2, 3, 4, 5, 6],
            [7, 8, 9, 0, 1, 2],
            [3, 4, 5, 6, 7, 8],
            [9, 0, 1, 2, 3, 4],
        ];

        $left = [
            [6, 2, 8, 4],
            [5, 1, 7, 3],
            [4, 0, 6, 2],
            [3, 9, 5, 1],
            [2, 8, 4, 0],
            [1, 7, 3, 9],
        ];

        $right = [
            [9, 3, 7, 1],
            [0, 4, 8, 2],
            [1, 5, 9, 3],
            [2, 6, 0, 4],
            [3, 7, 1, 5],
            [4, 8, 2, 6],
        ];

        $this->assertEquals($left, rotateLeft($matrix));
        $this->assertEquals($right, rotateRight($matrix));
    }

    public function testCharacterMatrix(): void
    {
        $matrix = [
            ['a', 'b', 'c', 'd'],
            ['aa', 'ab', 'ac', 'ad'],
            ['e', 'f', 'g', 'h'],
        ];

        $left = [
            ['d', 'ad', 'h'],
            ['c', 'ac', 'g'],
            ['b', 'ab', 'f'],
            ['a', 'aa', 'e'],
        ];

        $right = [
            ['e', 'aa', 'a'],
            ['f', 'ab', 'b'],
            ['g', 'ac', 'c'],
            ['h', 'ad', 'd'],
        ];

        $this->assertEquals($left, rotateLeft($matrix));
        $this->assertEquals($right, rotateRight($matrix));
    }

    public function testOneRowMatrix(): void
    {
        $matrix = [
            [1, 2, 3, 4, 5, 6],
        ];
        $left = [[6], [5], [4], [3], [2], [1]];
        $right = [[1], [2], [3], [4], [5], [6]];

        $this->assertEquals($left, rotateLeft($matrix));
        $this->assertEquals($right, rotateRight($matrix));
    }

    public function testOneColumnMatrix(): void
    {
        $matrix = [[1], [2], [3], [4], [5], [6]];
        $left = [[1, 2, 3, 4, 5, 6]];
        $right = [[6, 5, 4, 3, 2, 1]];
        $this->assertEquals($left, rotateLeft($matrix));
        $this->assertEquals($right, rotateRight($matrix));
    }
}
