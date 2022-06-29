<?php

namespace IsContinuousSequence\IsContinuousSequence;

function isContinuousSequence($arr): bool
{
    $lenArr = count($arr);
    if ($lenArr <= 1) {
        return false;
    }
    foreach ($arr as $i => $num) {
        if ($i + 1 >= $lenArr) {
            return true;
        }
        if ($num !== $arr[$i + 1] - 1) {
            return false;
        }
    }
    return true;
}
