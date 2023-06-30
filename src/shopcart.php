<?php

// productssssss
$products = [
    ['id' => 1, 'name' => 'Product 1', 'price' => 32],
    ['id' => 2, 'name' => 'Product 2', 'price' => 54],
    ['id' => 3, 'name' => 'Product 3', 'price' => 34],
    ['id' => 4, 'name' => 'Product 4', 'price' => 120],
    ['id' => 5, 'name' => 'Product 5', 'price' => 43],
    ['id' => 6, 'name' => 'Product 6', 'price' => 657],
];

//add thingies to the list
function addToCart($product_id, $quantity)
{

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }


    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

// remove item
function removeFromCart($product_id)
{
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

//count ittt
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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

   
        addToCart($product_id, $quantity);


        header('Location: books.php');
        exit;
    } elseif (isset($_POST['remove_product_id'])) {
        $remove_product_id = $_POST['remove_product_id'];

        removeFromCart($remove_product_id);

        header('Location: profile.php');
        exit;
    }
}

$itemCount = getCartItemCount();

$cartItems = getCartItems();





