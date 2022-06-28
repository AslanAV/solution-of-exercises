<?php

namespace Qsort\Qsort;

use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\cons;
use function Php\Pairs\Data\Lists\filter;
use function Php\Pairs\Data\Lists\concat;

function sort($list)
{
    if (isEmpty($list)) {
        return $list;
    }

    $tail = filter($list, fn ($item) => $item !== head($list));
    if (isEmpty($tail)) {
        return $list;
    }

    $element = head($list);

    $bigNum = filter($list, fn ($item) => $item >= $element);
    $smallNum = filter($list, fn ($item) => $item < $element);


    if (isEmpty($smallNum)) {
        return cons(head($bigNum), sort(tail($bigNum)));
    }
    if (isEmpty($bigNum)) {
        return cons(head($smallNum), sort(tail($smallNum)));
    }

    return concat(sort($smallNum), sort($bigNum));
}
