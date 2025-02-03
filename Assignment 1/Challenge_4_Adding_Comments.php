<?php
$price = 50;  // Base price of the item in dollars

$discount = 10;  # Discount to be subtracted from the price

/* Calculate the final price after applying the discount
   This is done by subtracting the discount from the base price */
$finalPrice = $price - $discount;

// Display the total price after the discount
echo "Total price: $" . $finalPrice;  // Expected output: Total price: $40
?>