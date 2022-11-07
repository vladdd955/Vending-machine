<?php

$coins = [
    200 => 10,
    100 => 0,
    50 =>  10,
    20 =>  10,
    10 => 10,
    5 => 0,
    2 => 10,
    1 => 10,
];


function createProducts(string $name, int $cost): stdClass
{
    $products = new stdClass();
    $products->name = $name;
    $products->cost = $cost;
    return $products;
}

$products = [
    createProducts("Cola", 150),
    createProducts("Coffee", 250),
    createProducts("Snack", 300),
    createProducts("Water", 80),
    createProducts("beer", 370),

];


function format(int $amount): string
{
    return ($amount / 100) . '$';
};

foreach ($products as $key => $product) {
    echo "[$key]" . " " . $product->name . " " . format($product->cost) . "\n";
}
echo "\n";

$userSelection = (int) readline("Chose a product what do you want -> ");
$userChose = $products[$userSelection];

$userMoney = 0;

while($userMoney < $userChose->cost) {
    $putCoins = (int)readline("Put your coins in machine in !!!CENTS!!! -> ");
    if (in_array($putCoins, array_keys($coins))) {
        $coins[$putCoins]++;
        $userMoney += $putCoins;
        echo "Your balance is -> " . format($userMoney) . "\n";
    } else {
        echo  "Invalid coin -> " . $putCoins . "\n";
    }
}


$reminder = $userMoney - $userChose->cost;

while($reminder > 0) {
    foreach ($coins as $coin => $amount) {
        if ($amount <= 0) {
            continue;
        }
        $coinsAmount = intdiv($reminder , $coin);
        $coins[$coin] -= $coinsAmount;

        if ($coinsAmount > 0) {
            $reminder -= $coin * $coinsAmount;
            echo "Give {$coin} x {$coinsAmount} \n";
        }
    }
}

// check to coins[]
//foreach ($coins as $coin => $value) {
//
//    echo "|" . $value . "|";
//}









