<nav class="navbar">
  <div class="brand-title">
    <img src="img/degreehat.jpg" class="logo" alt="" />EduScholar
  </div>
  <a href="#" class="toggle-button">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
  </a>
  <div class="navbar-links">
    <ul id="menuList">
      
      <?php
      
      if(isset($_SESSION['username'])){
        ?>
        <li><a href="fwelcome.php">Home</a></li>
        <!-- <li><a href="resetpwd.php">Reset password</a></li> -->
      <li><a href="logout.php">Logout</a></li>
    <!--  <li class="nav-item dropdown">
         <p class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img height="20" width="20" src="img/user.png" alt="">
        </a> 
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> 
          <a style="color: black;" class="dropdown-item" href="resetpwd.php">Reset password</a>
          <a style="color: black;" class="dropdown-item" href="logout.php">Logout</a>
         </div> 
      </li>-->

<?php
      }else if(isset($_SESSION['usn'])) {
      ?>
       <li><a href="welcome.php">Home</a></li>
        <li><a href="resetpwd.php">Reset password</a></li>
      <li><a href="logout.php">Logout</a></li>
  <?php }else {?>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>
