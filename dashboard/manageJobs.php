<?php include "../includes/conn.php"; ?>

<?php include "../includes/indexHeader.php" ?>

<body>
  <?php include "../includes/indexNavbar.php" ?>
  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php" ?>
    <div class="manage-job-content-container">
      <div class="headline">
        <h3>My Jobs Listings</h3>
      </div>
      <div class="job-item-container">
        <div class="profile-container">
          <img src="../assets/images/9bbb5f8aa2c4d5ac9ef31dec610ba406shreemangal.jpg" alt="">
        </div>
        <div class="job-info-container">
          <p>Active</p>
          <div class="title-with-job-status">
            <h3>Java Developer (Software Engineer)</h3>
            <div class="job-status">
              <i class="fa-solid fa-briefcase"></i>
              <p>Full Time</p>
            </div>
          </div>
          <div class="others-info">
            <div class="job-category-info">
              <i class="fa-solid fa-briefcase"></i>
              <p>Telecommunications industry</p>
            </div>
            <div class="date-info">
              <i class="fa-solid fa-calendar-days"></i>
              <p>2023-6-28 17:01:56</p>
            </div>
            <div class="salary-info">
              <i class="fa-solid fa-money-check-dollar"></i>
              <p>$2500-$3500</p>
            </div>
            <div class="location-info">
              <i class="fa-solid fa-location-dot"></i>
              <p>Dhaka&Chittagong</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</body>