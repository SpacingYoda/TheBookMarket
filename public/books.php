<?php

require __DIR__ . '/../src/bootstrap.php';

require_login();
?> 

<?php view('header', ['title' => 'Login']) ?>

<div class="banner">
    <div class="site-name">The Bookmarket</div>
        <div class="navigation-bar">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="laptops.php">Laptops</a></li>
            <li><a href="teachers.php">Teachers</a></li>
            <li><a href="contact-teacher.php">Contact a teacher</a></li>
    
    
          </ul>
        </div>


        <div>

<a id="profile-box" href="profile.php">
    <!-- Cart counter -->
    <?php echo "<span class='cart-count'>$itemCount Total items</span>"; ?>

    <div id="username-box">
      <span><?= current_user() ?></span>
    </div>
</a>


</div>  

</div>

  <?php

echo "<div class='product-list'>";
echo "<h1 class='category-title'>Books</h1>";

foreach ($products as $product) {
    $product_id = $product['id'];
    $product_name = $product['name'];

    echo "<div class='product'>";
    echo "<p class='product-name'>$product_name</p>";
    echo "<form method='POST' action='books.php'>";
    echo "<input type='hidden' name='product_id' value='$product_id'>";
    echo "<input type='number' name='quantity' class='product-quantity' value='1'>";
    echo "<button type='submit' class='add-to-cart-button'>Add to Cart</button>";
    echo "</form>";
    echo "</div>";
}

echo "</div>";


