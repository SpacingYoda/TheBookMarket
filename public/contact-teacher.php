<?php

require __DIR__ . '/../src/bootstrap.php';
require_login();
?> 

<?php view('header', ['title' => 'Login']) ?>

  <div class="banner">
    <div class="site-name">The Bookmarket</div>
    <div class="navigation-bar">
      <ul>
        <li>Home</li>
        <li>About</li>
        <li>Contact</li>


      </ul>
    </div>
    <a id="profile-box" href="profile.php">
        <div id="username-box">
          <p id="username">Byron</p>
        </div>
    </a>
  </div>