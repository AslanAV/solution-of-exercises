<?php

namespace Src\AtmMachine\CashMin;

function getCashMin(int $sum, array $cashMachineData): array
{
    $minCashOut = min(array_keys($cashMachineData));
    if ($sum % $minCashOut !== 0) {
        return ['Сумма не кратна'];
    }
    if ($sum < 0) {
        return ['Сумма меньше 0'];
    }

    $result = [
        50 => 0,
        100 => 0,
        500 => 0,
        1000 => 0,
        5000 => 0,
    ];
    ksort($cashMachineData);
    $prevBills = [];
    $needSum = $sum;
    foreach ($cashMachineData as $bill => $count) {
        while ($sum % $bill !== 0) {
            $prevBill = $prevBills[count($prevBills) - 1];
            if ($result[$prevBill] < 1) {
                unset($prevBills[count($prevBills) - 1]);
                $prevBill = $prevBills[count($prevBills) - 1];
            }
            $result[$prevBill]--;
            $sum += $prevBill;
        }
        for ($i = 0; $i < $count; $i++) {
            if ($sum > 0) {
                $sum -= $bill;
                $result[$bill]++;
            }
        }
        $prevBills[] = $bill;
    }
    $sumBill = 0;
    
    foreach ($result as $coin => $amount) {
        $sumBill += $coin * $amount;
    }

    if ($needSum !== $sumBill) {
        return ['Сумма недостаточна'];
    }
    return $result;
}
