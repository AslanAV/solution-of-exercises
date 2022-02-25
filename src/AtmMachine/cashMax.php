<?php

namespace Aslan\SolutionOfExercises\AtmMachine\cashMax;

$cashMachineData = [
    5000 => 5,
    1000 => 3,
    500 => 3,
    100 => 1,
    50 => 10,
];

function getCashMax(int $sum, array $cashMachineData): array
{
    $minCashOut = min(array_keys($cashMachineData));
    if ($sum % $minCashOut !== 0) {
        throw new \Exception('Сумма не кратна');
    }
    if ($sum < 0) {
        throw new \Exception('Сумма меньше 0');
    }
    $result = [
        5000 => 0,
        1000 => 0,
        500 => 0,
        100 => 0,
        50 => 0,
    ];
    $sumResult = 0;
    $needSum = $sum;
    foreach ($cashMachineData as $bill => $count) {
        if ($sum < $bill) {
            continue;
        }
        if ($sum === $sumResult) {
            break;
        }
        while ($needSum !== $sumResult && $sum >= $bill && $count > 0) {
            $result[$bill] += 1;
            $count -= 1;
            $sum -= $bill;
            $sumResult += $bill;
        };
    }

    if ($sumResult !== $needSum) {
        throw new \Exception('Сумма недостаточна');
    }
    return $result;
}

//var_dump(getCashMax(3500, $cashMachineData));
//var_dump(getCashMax(104500, $cashMachineData));
//var_dump(getCashMax(351, $cashMachineData));
// var_dump(getCashMax(150, $cashMachineData));
// var_dump(getCashMax(750, $cashMachineData));
var_dump(getCashMax(-750, $cashMachineData));