<?php

namespace Aslan\SolutionOfExercises\AtmMachine\Bankomat;

function getCashMax(int $sum): array
{
    $cashMachineData = [
        5000 => 5,
        1000 => 3,
        500 => 3,
        100 => 1,
        50 => 10,
    ];

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

getCashMax(100);

function getCashMin(int $sum): array
{
    $cashMachineData = [
        5000 => 5,
        1000 => 3,
        500 => 3,
        100 => 1,
        50 => 10,
    ];
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
    foreach ($result as $key => $value) {
        $sumBill += $key * $value;
    }
    print_r($sumBill);
    print_r("\n");
    if ($needSum !== $sumBill) {
        throw new \Exception('Сумма недостаточна');
    }
    return  $result;
}
var_dump(getCashMax(3500));
//var_dump(getCashMax(104500));
//var_dump(getCashMax(351));
//var_dump(getCashMax(150));
//var_dump(getCashMax(750));
//var_dump(getCashMax(-750));


var_dump(getCashMin(3500));
//var_dump(getCashMin(104500));
//var_dump(getCashMin(351));
//var_dump(getCashMin(150));
//var_dump(getCashMin(750));
//var_dump(getCashMin(-750));
