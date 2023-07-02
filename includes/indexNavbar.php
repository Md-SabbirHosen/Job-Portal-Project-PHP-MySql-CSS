<div id="header">
  <div class="container">
    <div class="header-left">
      <div class="logo-container">
        <img src="../assets/images/logo.png" alt="logo">
        <h3>Job Portal</h3>
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="../index.php">Home</a> </li>
          <li><a href="../findJobs.php">Find Jobs</a></li>
          <li><a href="">Browse Companies</a></li>
          <li><a href="">About Us</a></li>
          <li><a href="">Contact Us</a></li>
        </ul>
      </nav>
    </div>

    <div class="navigation header-right">
      <?php
      session_start();
      // Check if the user is logged in
      if (isset($_SESSION['email'])) {
        // User is logged in, display the user's name and dropdown menu
        $username = explode('@', $_SESSION['email'])[0];
        echo '<div class="dropdown">';
        echo '<button class="dropdown-btn">' . 'Hi,  ' . $username . '!' . '</button>';
        echo '<div class="dropdown-content">';
        echo '<a href="../dashboard/dashboard.php" class="nav-link"> <i class="fa-solid fa-table-cells-large"></i> Dashboard</a>';
        echo '<a href="../dashboard/editProfile.php" class="nav-link"> <i class="fa-solid fa-user"></i> My Profile</a>';
        echo '<a href="../process/logout.php" class="nav-link"> <i class="fa-solid fa-power-off"></i> Logout</a>';
        echo '</div>';
        echo '</div>';
      } else {
        // User is not logged in, display the "Sign In" button
        echo '<a href="../login.php" class="btn">Sign In</a>';
      }
      ?>
    </div>
  </div>
</div>