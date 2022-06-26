<?php

namespace Src\AtmMachine\CashMax;

function getCashMax(int $sum, array $cashMachineData): array
{
    $minCashOut = min(array_keys($cashMachineData));
    if ($sum % $minCashOut !== 0) {
        return ['Сумма не кратна'];
    }
    if ($sum < 0) {
        return ['Сумма меньше 0'];
    }
    $sumResult = 0;
    $needSum = $sum;

    $result = [
        50 => 0,
        100 => 0,
        500 => 0,
        1000 => 0,
        5000 => 0
    ];
    foreach ($cashMachineData as $bill => $count) {
        if ($sum < $bill) {
            continue;
        }
        if ($sum === $sumResult) {
            break;
        }
        while ($needSum !== $sumResult && $sum >= $bill && $count > 0) {
            $result[$bill]++;
            $count--;
            $sum -= $bill;
            $sumResult += $bill;
        }
    }

    if ($sumResult !== $needSum) {
        return ['Сумма недостаточна'];
    }
    return $result;
}
