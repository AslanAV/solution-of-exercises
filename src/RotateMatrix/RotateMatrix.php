<?php

namespace RotateMatrix\RotateMatrix;

function rotateLeft($arr): array
{
    $arrRes = [];
    $i = count($arr[0]) - 1;
    for ($n = 0, $countColl = count($arr[0]); $n < $countColl; $n++) {
        $k = 0;
        for ($m = 0, $countRaw = count($arr); $m < $countRaw; $m++) {
            if (array_key_exists($k, $arr)) {
                $arrRes[$n][$m] = $arr[$k][$i];
                $k++;
            }
        }
        $i--;
    }
    return $arrRes;
}

function rotateRight($arr): array
{
    $arrRes = [];
    $i = 0;
    for ($n = 0, $countColl = count($arr[0]); $n < $countColl; $n++) {
        $k = count($arr) - 1;
        for ($m = 0, $countRaw = count($arr); $m < $countRaw; $m++) {
            $arrRes[$n][$m] = $arr[$k][$i];
            $k--;
        }
        $i++;
    }
    return $arrRes;
}
