<aside class="sidebar">
  <div class="dashboard-profile-box">
    <!-- job seeker sidebar -->
    <?php if (($_SESSION['role_id']) == 1) :
      $id_user = $_SESSION['id_user'];
      // getting the job details
      $sql = "SELECT * FROM users WHERE id_user='$id_user'";
      $query = $conn->query($sql);
      $row = $query->fetch_assoc();
    ?>
      <div class="user-profile-text">
        <span class="fullname"><?php echo $row['fullname'] ?></span>
      </div>
    <?php endif; ?>
  </div>
  <ul>
    <!-- Job seeker -->
    <?php if (($_SESSION['role_id']) == 1) : ?>
      <li><a href="dashboard.php">
          <span class="icon-container">
            <i class="fa-solid fa-table-cells-large"></i>
          </span> Dashboard
        </a></li>
      <li><a href="myResume.php"><span class="icon-container">
            <i class="fa-sharp fa-solid fa-file-pdf"></i>
          </span> Manage Resume</a></li>
      <li><a href="editProfile.php"><span class="icon-container">
            <i class="fa-solid fa-user"></i>
          </span> Edit Profile</a></li>
      <li><a href="../process/logout.php"><span class="icon-container">
            <i class="fa-solid fa-power-off"></i>
          </span> Logout</a></li>
    <?php endif; ?>
  </ul>
</aside>