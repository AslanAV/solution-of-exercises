<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function GameIsPalindrome\Engine\getRandomWord;
use function GameIsPalindrome\Engine\isPalindrome;
use function GameIsPalindrome\Engine\isPositiveAnswer;
use function GameIsPalindrome\Engine\reverseStr;

class GameIsPalindromeTest extends TestCase
{
    public function testReverseStr(): void
    {
        $this->assertEquals('радар', reverseStr('радар'));
        $this->assertEquals('дед', reverseStr('дед'));
    }

    public function testIsPalindrome(): void
    {
        $this->assertTrue(isPalindrome('радар'));
        $this->assertFalse(isPalindrome('сказка'));
    }

    public function testGetRandomWord(): void
    {
        $words = [
            'радар',
            'игра',
            'дед',
            'довод',
            'доход',
            'заказ',
            'сказка'
        ];
        $this->assertContains(getRandomWord(), $words);
        $this->assertContains(getRandomWord(), $words);
        $this->assertContains(getRandomWord(), $words);
        $this->assertContains(getRandomWord(), $words);
    }

    public function testIsPositiveAnswer(): void
    {
        $this->assertTrue(isPositiveAnswer('y'));
        $this->assertFalse(isPositiveAnswer('n'));
        $this->assertFalse(isPositiveAnswer('a'));
        $this->assertFalse(isPositiveAnswer(''));
        $this->assertFalse(isPositiveAnswer('NASDAQ'));
    }
}
