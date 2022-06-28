<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\toString as listToString;
use function Qsort\Qsort\sort;

class QsortTest extends TestCase
{
    public function testQsort(): void
    {
        $result = sort(l());
        $this->assertEquals(listToString(l()), listToString($result));

        $result2 = sort(l(5, -3, 2, 10, 4, 4, 5));
        $this->assertEquals(listToString(l(-3, 2, 4, 4, 5, 5, 10)), listToString($result2));

        $result3 = sort(l(3, 3, 0, -1, 0, 4, -5));
        $this->assertEquals(listToString(l(-5, -1, 0, 0, 3, 3, 4)), listToString($result3));

        $result4 = sort(l(5, -3, 2, 10, 4, 3, 5));
        $this->assertEquals(listToString(l(-3, 2, 3, 4, 5, 5, 10)), listToString($result4));
    }
}
