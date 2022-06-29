<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function BattleShip\BattleShip\calcShipsCount;
use function BattleShip\BattleShip\isValidField;

class BattleShipTest extends TestCase
{
    public function testCalcShipsCount(): void
    {
        $battleField1 = [];

        $battleField2 = [[1]];

        $battleField3 = [[0]];

        $battleField4 = [
            [0, 0, 1],
            [0, 0, 0],
            [1, 1, 0],
        ];

        $battleField5 =  [
            [1, 1, 0, 0, 0, 0],
            [0, 0, 0, 1, 1, 1],
            [0, 0, 0, 0, 0, 0],
            [0, 1, 1, 1, 0, 1],
            [0, 0, 0, 0, 0, 1],
            [1, 1, 0, 1, 0, 1],
        ];

        $this->assertEquals(0, calcShipsCount($battleField1));
        $this->assertEquals(1, calcShipsCount($battleField2));
        $this->assertEquals(0, calcShipsCount($battleField3));
        $this->assertEquals(2, calcShipsCount($battleField4));
        $this->assertEquals(6, calcShipsCount($battleField5));
    }

    public function testIsValidField(): void
    {
        $battleField1 = [];

        $battleField2 = [
            [0, 1, 0, 0],
            [1, 0, 0, 1],
            [0, 0, 0, 0],
            [0, 1, 1, 1],
        ];

        $battleField3 = [
            [0, 1, 1, 0],
            [0, 0, 0, 0],
            [0, 1, 0, 0],
            [0, 1, 0, 1],
        ];

        $battleField4 = [
            [1, 1, 0, 0, 0, 0],
            [0, 0, 0, 1, 1, 1],
            [0, 0, 0, 0, 0, 0],
            [0, 1, 1, 1, 0, 1],
            [0, 0, 0, 0, 0, 1],
            [1, 1, 0, 1, 0, 0],
        ];

        $battleField5 = [
            [1, 1, 0, 0, 0, 0],
            [0, 0, 0, 1, 1, 1],
            [0, 0, 0, 0, 0, 0],
            [0, 1, 1, 0, 0, 1],
            [0, 0, 1, 0, 0, 1],
            [0, 0, 0, 0, 0, 0],
        ];

        $this->assertTrue(isValidField($battleField1));
        $this->assertFalse(isValidField($battleField2));
        $this->assertTrue(isValidField($battleField3));
        $this->assertTrue(isValidField($battleField4));
        $this->assertFalse(isValidField($battleField5));
    }
}
