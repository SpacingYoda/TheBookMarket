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

        <div id="logout">
            <span><a href="logout.php">Logout</a></span>
        </div>
    </div>  

  </div>

  <div class="shopping-cart">
  <h2>Your items</h2>
  <?php if (count($cartItems) > 0) : ?>
    <ul>
      <?php foreach ($cartItems as $item) : ?>
        <li>
          <span class="product-name"><?php echo $item['name']; ?></span>
          <span class="product-quantity">Quantity: <?php echo $item['quantity']; ?></span>
          <span class="product-price">Price: <?php echo $item['price']; ?></span>
          <form method="POST" action="profile.php">
            <input type="hidden" name="remove_product_id" value="<?php echo $item['id']; ?>">
            <button type="submit">Remove</button>
          </form>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else : ?>
    <p>You don't have any items.</p>
  <?php endif; ?>
</div>
