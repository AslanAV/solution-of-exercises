<?php

namespace FizzBuzz\Fizzbuzz;

function fizzBuzz($begin, $end): void
{
    $result = '';
    if ($begin > $end) {
        echo $result;
        return;
    }
    for ($i = $begin; $i <= $end; $i++) {
        if ($i % 3 === 0) {
            if ($i % 5 === 0) {
                $result .= ' FizzBuzz';
            } else {
                $result .= ' Fizz';
            }
        } elseif ($i % 5 === 0) {
            $result .= ' Buzz';
        } else {
            $result .= ' ' . $i;
        }
    }
    if ($result[0] === ' ') {
        $result = substr($result, 1);
    }
    echo $result;
}
