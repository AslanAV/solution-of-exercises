<?php

namespace BattleShip\BattleShip;

function calcShipsCount($arr): int
{
    $k = 0;
    $shipsCount = 0;
    foreach ($arr as $i => $item) {
        foreach ($item as $j => $subItem) {
            if ($subItem === 1) {
                $result[$k][0] = $i;
                $result[$k][1] = $j;
                $k++;
                $shipsCount++;
                if (array_key_exists(($i - 1), $arr) && $arr[$i - 1][$j] === 1) {
                    $shipsCount--;
                }
                if (array_key_exists(($j - 1), $item) && $item[$j - 1] === 1) {
                    $shipsCount--;
                }
            }
        }
    }
    return $shipsCount;
}

function isValidField($arr): bool
{
    foreach ($arr as $i => $item) {
        foreach ($item as $j => $subItem) {
            if (
                array_key_exists(($i - 1), $arr)
                && array_key_exists(($j - 1), $item)
                && $arr[$i - 1][$j - 1] === 1 && $subItem === 1
            ) {
                return false;
            }

            if (
                array_key_exists(($i - 1), $arr)
                && array_key_exists(($j + 1), $item)
                && $arr[$i - 1][$j + 1] === 1 && $subItem === 1
            ) {
                return false;
            }

            if (
                array_key_exists(($i + 1), $arr)
                && array_key_exists(($j - 1), $item)
                && $arr[$i + 1][$j - 1] === 1 && $subItem === 1
            ) {
                return false;
            }

            if (
                array_key_exists(($i + 1), $arr)
                && array_key_exists(($j + 1), $item)
                && $arr[$i + 1][$j + 1] === 1 && $subItem === 1
            ) {
                return false;
            }
        }
    }
    return true;
}
