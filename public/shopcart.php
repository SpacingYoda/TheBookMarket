<?php


require __DIR__ . '/../src/bootstrap.php';
require_login();
?> 

<?php view('header', ['title' => 'Login']) ?>

<?php

// Dummy product data
$products = [
    ['id' => 1, 'name' => 'Product 1', 'price' => 10],
    ['id' => 2, 'name' => 'Product 2', 'price' => 20],
    ['id' => 3, 'name' => 'Product 3', 'price' => 15],
];

// Function to add a product to the cart
function addToCart($product_id, $quantity)
{
    // Check if the cart is already set in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the product to the cart
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

// Function to remove a product from the cart
function removeFromCart($product_id)
{
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Function to get the total number of items in the cart
function getCartItemCount()
{
    $count = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $quantity) {
            $count += $quantity;
        }
    }
    return $count;
}

// Function to get the items in the cart
function getCartItems()
{
    $cartItems = array();
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $product = getProductById($product_id);
            if ($product) {
                $product['quantity'] = $quantity;
                $cartItems[] = $product;
            }
        }
    }
    return $cartItems;
}

// Function to get product details by ID
function getProductById($product_id)
{
    global $products;
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            return $product;
        }
    }
    return null;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Add the product to the cart
        addToCart($product_id, $quantity);

        // Redirect to prevent form resubmission on refresh
        header('Location: shopcart.php');
        exit;
    } elseif (isset($_POST['remove_product_id'])) {
        $remove_product_id = $_POST['remove_product_id'];

        // Remove the product from the cart
        removeFromCart($remove_product_id);

        // Redirect to prevent form resubmission on refresh
        header('Location: shopcart.php');
        exit;
    }
}

// Get the total number of items in the cart
$itemCount = getCartItemCount();

// Get the items in the cart
$cartItems = getCartItems();

// Display the cart count
echo "Cart Count: $itemCount<br>";

// Display the items in the cart
if (count($cartItems) > 0) {
    echo "<h2>Shopping Cart:</h2>";
    echo "<ul>";
    foreach ($cartItems as $item) {
        $product_id = $item['id'];
        $product_name = $item['name'];
        $product_quantity = $item['quantity'];
        $product_price = $item['price'];

        echo "<li>$product_name - Quantity: $product_quantity - Price: $product_price ";
        echo "<form method='POST' action='shopcart.php'>";
        echo "<input type='hidden' name='remove_product_id' value='$product_id'>";
        echo "<button type='submit'>Remove</button>";
        echo "</form>";
        echo "</li>";
    }
    echo "</ul>";
}

// Display the products with add to cart buttons
echo "<h2>Products:</h2>";
foreach ($products as $product) {
    $product_id = $product['id'];
    $product_name = $product['name'];

    echo "<p>$product_name</p>";
    echo "<form method='POST' action='shopcart.php'>";
    echo "<input type='hidden' name='product_id' value='$product_id'>";
    echo "<input type='number' name='quantity' value='1'>";
    echo "<button type='submit'>Add to Cart</button>";
    echo "</form>";
}
?>
