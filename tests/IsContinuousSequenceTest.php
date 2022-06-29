<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function IsContinuousSequence\IsContinuousSequence\isContinuousSequence;

class IsContinuousSequenceTest extends TestCase
{
    public function testIsContinuousSequence(): void
    {
        $this->assertFalse(isContinuousSequence([]));
        $this->assertFalse(isContinuousSequence([7]));
        $this->assertFalse(isContinuousSequence([5, 3, 2, 8]));
        $this->assertFalse(isContinuousSequence([10, 11, 12, 14, 15]));
        $this->assertFalse(isContinuousSequence([10, 11, 11, 12]));

        $this->assertTrue(isContinuousSequence([0, 1, 2, 3]));
        $this->assertTrue(isContinuousSequence([-5, -4, -3]));
        $this->assertTrue(isContinuousSequence([10, 11, 12, 13]));
    }
}
