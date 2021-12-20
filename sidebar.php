<nav id="sidebar">
		<div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-primary"></button>
        </div>
        <!-- style="background-image: url(images/bg_1.jpg);" -->
	  		<div class="img bg-wrap text-center py-4">
	  			<div class="user-logo">
	  				<!-- <div class="img" style="background-image: url(images/logo.jpg);"></div> -->
	  				<h3><a href="fwelcome.php" style="color:white; text-decoration: none;">DASHBOARD</a></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="fwelcome.php"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
            <a href="students.php"><span class="fa fa-user mr-3"></span> Student List</a>
          </li>
          <?php if($_SESSION["username"]=="faculty1") { ?>
          <li>
            <a href="updatemarks.php"><span class="fa fa-book mr-3"></span> Add marks</a>
          </li>
          <li>
            <a href="updateattendance.php"><span class="fa fa-address-book mr-3"></span>Update Attendance</a>
          </li>
          <!-- <li>
            <a href="resetpwd.php"><span class="fa fa-cog mr-3"></span> Change password</a>
          </li> -->
          <?php }
        else { ?>
          <li>
            <a href="updatemarks2.php"><span class="fa fa-book mr-3"></span> Add marks</a>
          </li>
          <li>
            <a href="updateattendance2.php"><span class="fa fa-address-book mr-3"></span>Update Attendance</a>
          </li>
        <?php } ?>
          <!-- <li>
            <a href="resetpwd.php"><span class="fa fa-cog mr-3"></span> Change password</a>
          </li> -->
          <li>
            <a href="viewattendance_form.php"><span class="fa fa-address-book mr-3"></span>View Attendance</a>
          </li>
          <li>
            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
          
        </ul>

    	</nav>