<?php

namespace Brackets\Brackets;

function isBalanced($str): bool
{
    if ($str === '') {
        return true;
    }
    $countOpen = 0;
    $countClose = 0;
    for ($i = 0, $len = strlen($str); $i < $len; $i++) {
        if ($str[$i] === '(') {
            $countOpen++;
        } elseif ($str[$i] === ')') {
            $countClose++;
        }
        if ($countOpen < $countClose) {
            return false;
        }
    }
    return $countOpen === $countClose;
}
