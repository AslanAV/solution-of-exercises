<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

function getQuotes(): array
{
    return [
            'Когда мы встречаемся с друзьями, то становимся теми, от кого родители велели держаться подальше!',
            'Дружба – это если косячить, то вместе.',
            'Закон дружбы: в восторге можешь ты не быть, но лaйкнуть всё равно обязан.',
            'Подруга – это служба новостей, ликеро-водочный магазин и центр психологической поддержки.'
    ];
}


function getRandomQuote(array $quotes): string
{
    $minIndex = 0;
    $maxIndex = count($quotes) - 1;
    $randomIndex = random_int($minIndex, $maxIndex);
    return $quotes[$randomIndex];
}

function getImage(): array
{
    $finder = new Finder();
    $finder->files()->in(__DIR__ . '/img');
    return  iterator_to_array($finder);
}


function getRandomImageUrl(array $images):string
{
    /** @var SplFileInfo $randomImage*/
    $randomImage = $images[array_rand($images)];
    return '/img/' . $randomImage->getFilename();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quote Generator</title>
</head>
<body>
    <div class="container">
        <img src="<?= getRandomImageUrl(getImage())?>" alt="enstein" height="512px">
        <h1>
            <?= getRandomQuote(getQuotes())?>
        </h1>
    </div>
</body>
</html>