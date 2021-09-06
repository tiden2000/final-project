<div class="row" id='top-menu'>
        <div class="col">
          <a href="tel:123-456-7890">123-456-7890</a>
        </div>
  
        <div class="col">       
          <a href="mailto:company@mail.com">company@mail.com</a>
        </div>
  
        <div class="col-1">
          <?php
          if(isset($_SESSION['username'])) {echo "<a href='" . "seller.php" . "'>" . $_SESSION['username'] . "</a>";}
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

              <li><a class='dropdown-arrow' href='http://'>LISTINGS</a>
                <ul class='sub-menus'>
                  <li><a href='http://'>House</a></li>
                  <li><a href='http://'>Apartment</a></li>
                  <li><a href='http://'>Penthouse</a></li>
                  <li><a href='http://'>Commercial</a></li>
                </ul>
              </li>

              <li><a href='/products.php'>PROPERTIES</a>
              </li>

              <li><a href='/about.php'>ABOUT</a></li>

              <li><a href='http://'>CONTACT</a></li>

            </ul>

          </nav>
          
        </div>
      </div>