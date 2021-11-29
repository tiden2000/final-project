<div class="row" id='top-menu'>
        <div class="col">
          <a href="tel:123-456-7890">123-456-7890</a>
        </div>
  
        <div class="col">       
          <a href="mailto:company@mail.com">company@mail.com</a>
        </div>
  
        <div class="col-1">
          <?php
          if(isset($_SESSION['username']) and $_SESSION['type'] == "Seller") {echo "<a href='" . "seller.php" . "'>" . $_SESSION['username'] . "</a>";}
          else if(isset($_SESSION['username']) and $_SESSION['type'] == "User") {echo "<a href='" . "orders.php" . "'>" . $_SESSION['username'] . "</a>";}
          else if(isset($_SESSION['username']) and $_SESSION['type'] == "Admin") {echo "<a href='" . "admin.php" . "'>" . $_SESSION['username'] . "</a>";}
          else {echo "<a href='" . "register.php" . "'>" . "Register" . "</a>";}
          ?>
        </div>
  
        <div class="col-1">
          <?php
          if(isset($_SESSION['username'])) {echo "<a href='" . "logout.php" . "'>" . "Logout" . "</a>";}
          else {echo "<a href='" . "login.php" . "'>" . "Login" . "</a>";}
          ?>
        </div>
      </div>
  
  
      <div class="row">
        <div id='navbar'>

          <a href="index.php"><img src="img/logo.png" alt="logo" id='logo'></a>

          <nav id='menu'>
            <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
            <ul>

              <li><a href='/index.php'>HOME</a></li>

              <li><a class='dropdown-arrow' href='index.php'>LISTINGS</a>
                <ul class='sub-menus'>
                  <li><a href='house.php'>House</a></li>
                  <li><a href='apartment.php'>Apartment</a></li>
                  <li><a href='penthouse.php'>Penthouse</a></li>
                  <li><a href='commercial.php'>Commercial</a></li>
                  <li><a href='office.php'>Office</a></li>
                </ul>
              </li>

              <li><a href='/products.php'>PROPERTIES</a>
              </li>

              <li><a href='/about.php'>ABOUT</a></li>

              <li><a href='/contact.php'>CONTACT</a></li>

            </ul>

          </nav>
          
        </div>
      </div>