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
  