<?php

namespace Src\HammingWeight\HammingWeight;

function hammingWeight($num): int
{
    $dec = decbin($num);
    $str = $dec;
    $len = strlen($str);
    $result = 0;
    for ($i = 0; $i < $len; $i++) {
        $result += (int)$str[$i];
    }
    return $result;
}
