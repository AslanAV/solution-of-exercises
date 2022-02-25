<?php

namespace Aslan\SolutionOfExercises\AtmMachine\CashMin;

$cashMachineData = [
    5000 => 5,
    1000 => 3,
    500 => 3,
    100 => 1,
    50 => 10,
];

function getCashMin(int $sum, array $cashMachineData): array
{
    
    $minCashOut = min(array_keys($cashMachineData));
    if ($sum % $minCashOut !== 0) {
        throw new \Exception('Сумма некратна');
    }
    if ($sum < 0) {
        throw new \Exception('Сумма меньше 0');
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
            $result[$prevBill] -= 1;
            $sum += $prevBill;
        }
        for ($i = 0; $i < $count; $i++) {
            if ($sum > 0) {
                $sum -= $bill;
                $result[$bill] += 1;
            }
        }
        $prevBills[] = $bill;
    }
    $sumBill = 0;
    
    foreach ($result as $coin => $amount) {
        $sumBill += $coin * $amount;
    }
    print_r($sumBill);
    print_r("\n");
    if ($needSum !== $sumBill) {
        throw new \Exception('Сумма недостаточна');
    }
    return  $result;
} 


// var_dump(getCashMin(3500, $cashMachineData));
// var_dump(getCashMin(104500, $cashMachineData));
// var_dump(getCashMin(351, $cashMachineData));
// var_dump(getCashMin(150, $cashMachineData));
// var_dump(getCashMin(750, $cashMachineData));
var_dump(getCashMin(-750, $cashMachineData));