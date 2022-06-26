<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function GameIsPalindrome\Engine\isPalindrome;
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

}
