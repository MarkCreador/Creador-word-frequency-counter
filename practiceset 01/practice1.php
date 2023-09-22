<?php

/**
 * Calculates the total price of items in a shopping cart.
 *
 * @param array $items An array of items with 'name' and 'price' keys.
 *
 * @return float The total price of the items.
 */
function calculateTotalPrice(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

/**
 * Modifies a string by removing spaces and converting it to lowercase.
 *
 * @param string $inputString The input string to be modified.
 *
 * @return string The modified string.
 */
function removeSpaceAndConvertToLowercase(string $inputString): string {
    $string = str_replace(' ', '', $inputString);
    return strtolower($string);
}

/**
 * Checks if a number is even or odd.
 *
 * @param int $number The number to be checked.
 *
 * @return string A message indicating whether the number is even or odd.
 */
function checkEvenOrOdd(int $number): string {
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}

$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

$total = calculateTotalPrice($items);
echo  "<br>Total price: $" . $total;

$string = "This is a poorly written program with little structure and readability.";
$modifiedString = removeSpaceAndConvertToLowercase($string);
echo "<br>Modified string: " . $modifiedString;

$number = 42;
$message = checkEvenOrOdd($number);
echo "<br>$message";
