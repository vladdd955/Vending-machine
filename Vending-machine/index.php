<?php

$coins = [
    200 => 1,
    100 => 1,
    50 =>  1,
    20 =>  1,
    10 => 1,
    5 => 1,
    2 => 1,
    1 => 1,
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
echo  "Thanks man look, its your change -> " . format($reminder) . "\n";








