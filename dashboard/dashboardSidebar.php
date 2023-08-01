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
    <!-- employer sidebar -->
    <?php if (($_SESSION['role_id']) == 2) :
      $id_company = $_SESSION['id_company'];
      // getting the job details
      $sql = "SELECT * FROM company WHERE id_company='$id_company'";
      $query = $conn->query($sql);
      $row = $query->fetch_assoc();
    ?>
      <div class="user-profile-text">
        <span class="fullname"><?php echo $row['companyname'] ?></span>
      </div>
    <?php endif; ?>

    <!-- admin sidebar -->
    <?php if (($_SESSION['role_id']) == 3) :
      $id_admin = $_SESSION['id_admin'];
      // getting the admin details
      $sql = "SELECT * FROM admin WHERE id_admin='$id_admin'";
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
    <?php if (($_SESSION['role_id']) == 2) : ?>
      <li><a href="dashboard.php">
          <span class="icon-container">
            <i class="fa-solid fa-table-cells-large"></i>
          </span> Dashboard
        </a></li>
      <li><a href="./addJob.php"><span class="icon-container">
            <i class="fa-solid fa-file-circle-plus"></i>
          </span>Add New Job</a></li>
      <li><a href="manageJobs.php"><span class="icon-container">
            <i class="fa-solid fa-file-pen"></i>
          </span>Manage Jobs</a></li>
      <li><a href="./manageApplications.php"><span class="icon-container">
            <i class="fa-sharp fa-solid fa-file-pdf"></i>
          </span>Manage Applications</a></li>
      <li><a href="editProfile.php"><span class="icon-container">
            <i class="fa-solid fa-user"></i>
          </span> Edit Profile</a></li>
      <li><a href="../process/logout.php"><span class="icon-container">
            <i class="fa-solid fa-power-off"></i>
          </span> Logout</a></li>
    <?php endif; ?>
    <?php if ($_SESSION['role_id'] == 3) : ?>
      <li><a href="dashboard.php">
          <span class="icon-container">
            <i class="fa-solid fa-table-cells-large"></i>
          </span> Dashboard
        </a></li>
      <li><a href="./allJobPost.php"><span class="icon-container">
            <i class="fa-solid fa-briefcase"></i>
          </span>All Job Posts
          <?php $sql = "SELECT * FROM job_post";
          $query = $conn->query($sql);
          echo '<span style="background-color:#101935;padding:0px 0.5rem;border-radius:50%;margin-left:1rem;" >' . $query->num_rows . '</span>' ?> </a></li>
      <li><a href="./allCompanies.php"><span class="icon-container">
            <i class="fa-solid fa-building"></i>
          </span>All Companies <?php $sql = "SELECT * FROM company";
                                $query = $conn->query($sql);
                                echo '<span style="background-color:#101935;padding:0px 0.5rem;border-radius:50%;margin-left:1rem;" >' . $query->num_rows . '</span>' ?>
        </a> </li>

      <li><a href="./allJobSeekers.php"><span class="icon-container">
            <i class="fa-solid fa-people-group"></i>
          </span>All Job Seekers <?php $sql = "SELECT * FROM users";
                                  $query = $conn->query($sql);
                                  echo '<span style="background-color:#101935;padding:0px 0.5rem;border-radius:50%;margin-left:1rem;" >' . $query->num_rows . '</span>' ?>
        </a></li>
      <li><a href="./adminUsers.php"><span class="icon-container">
            <i class="fa-solid fa-circle-user"></i>
          </span>Users - Admin<?php $sql = "SELECT * FROM admin";
                              $query = $conn->query($sql);
                              echo '<span style="background-color:#101935;padding:0px 0.5rem;border-radius:50%;margin-left:1rem;" >' . $query->num_rows . '</span>' ?></a></li>
      <li><a href="editProfile.php"><span class="icon-container">
            <i class="fa-solid fa-user"></i>
          </span> Edit Profile</a></li>
      <li><a href="../process/logout.php"><span class="icon-container">
            <i class="fa-solid fa-power-off"></i>
          </span> Logout</a></li>
    <?php endif; ?>
  </ul>
</aside>