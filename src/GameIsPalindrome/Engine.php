<?php

namespace GameIsPalindrome\Engine;

use function cli\choose;
use function cli\line;

function game(): void
{
    line('Это игра полиндром. Игроку нужно ответить является ли слово палиндромом.');
    line('Добро пожаловать в игру!');

    $score = 0;
    while (true) {
        $word = getRandomWord();
        $playerAnswer = choose("Слово \"{$word}\" является полиндромом?");
        $playerAnswer = isPositiveAnswer($playerAnswer);
        $gameAnswer = isPalindrome($word);
        if ($playerAnswer === $gameAnswer) {
            $score++;
            line("Верно! Текущий счет: {$score}");
        } else {
            line("Ошибка! Игра Окончена! Итоговый счет: {$score}");
            break;
        }
    }
}

function isPositiveAnswer(string $answer): bool
{
    return $answer === 'y';
}

function getRandomWord(): string
{
    $words = [
        'радар',
        'игра',
        'дед',
        'довод',
        'доход',
        'заказ',
        'сказка'
    ];

    $randomIndex = array_rand($words);
    return $words[$randomIndex];
}

function isPalindrome(string $word): bool
{
    return reverseStr($word) === $word;
}


function reverseStr($str): string
{
    preg_match_all('/./us', $str, $array);
    return implode('', array_reverse($array[0]));
}
