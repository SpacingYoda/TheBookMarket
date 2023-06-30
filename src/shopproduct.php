<?php

session_start();

// Display the products with add to cart buttons
echo "<h2>Products:</h2>";
foreach ($products as $product) {
    $product_id = $product['id'];
    $product_name = $product['name'];

    echo "<p>$product_name</p>";
    echo "<form method='POST' action='profile.php'>";
    echo "<input type='hidden' name='product_id' value='$product_id'>";
    echo "<input type='number' name='quantity' value='1'>";
    echo "<button type='submit'>Add to Cart</button>";
    echo "</form>";
}