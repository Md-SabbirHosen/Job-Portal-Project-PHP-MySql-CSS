<?php include "../includes/conn.php"; ?>

<?php include "../includes/indexHeader.php" ?>

<body>
  <?php include "../includes/indexNavbar.php" ?>
  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php" ?>
    <div class="manage-jobs-container">
      <div class="headline">
        <h3>Job Applications</h3>
      </div>
      <?php
      $id_company = $_SESSION['id_company'];

      $sql =  "SELECT * FROM applied_jobposts WHERE id_company = '$id_company' ORDER BY id_applied DESC";
      $query = $conn->query($sql);
      while ($row = $query->fetch_assoc()) {
        $id_jobpost = $row['id_jobpost'];
        $sql1 =  "SELECT * FROM job_post WHERE id_company = '$id_company' AND id_jobpost = '$id_jobpost'";
        $query1 = $conn->query($sql1);
        while ($row1 = $query1->fetch_assoc()) {
          $city_id = $row1['city_id'];
          $industry = $row1['industry_id'];
          $jobtype = $row1['job_status'];
          $location = $conn->query("SELECT name FROM districts_or_cities WHERE id = '$city_id'");
          $category = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
          $profile_pic = $conn->query("SELECT profile_pic FROM company WHERE id_company = '$id_company'");
          $jobtype = $conn->query("SELECT type FROM job_type WHERE id = '$jobtype'");
          $jobtype = $jobtype->fetch_assoc();
          $location = $location->fetch_assoc();
          $category = $category->fetch_assoc();
          $profile_pic = $profile_pic->fetch_assoc();
      ?>
          <div class="job-item-container">
            <div class="profile-container">
              <img src="../assets/images/<?php echo $profile_pic['profile_pic'] ?>" alt="">
            </div>
            <div class="job-info-container">
              <?php
              $sql2 = "SELECT * from applied_jobposts where id_jobpost = '$id_jobpost'";
              $query2 = $conn->query($sql2);

              echo '<div><a class="validity-active btn-green" >' . $query2->num_rows . ' Applications <i class="fa-regular fa-eye" style="color:white; font-size:.85rem;" ></i></a></div>';
              ?>
              <div class="title-with-status">
                <h3>JavaDeveloper</h3>
                <div class="job-status">
                  <i class="fa-solid fa-briefcase"></i>
                  <span><?php echo $jobtype['type'] ?></span>
                </div>
                <span class="validity-active btn-green">Active</span>
              </div>
              <div class="others-info">
                <div class="job-category-info">
                  <i class="fa-solid fa-briefcase"></i>
                  <span><?php echo $category['name'] ?></span>
                </div>
                <div class="date-info">
                  <i class="fa-solid fa-calendar-days"></i>
                  <span><?php echo $row1['createdat'] ?></span>
                </div>
                <div class="salary-info">
                  <i class="fa-solid fa-money-check-dollar"></i>
                  <span><?php echo $row1["minimumsalary"] . "-" . $row1["maximumsalary"] ?></span>
                </div>
                <div class="location-info">
                  <i class="fa-solid fa-location-dot"></i>
                  <span><?php echo $location['name'] ?></span>
                </div>
              </div>
            </div>
          </div>
      <?php }
      } ?>

    </div>
  </div>
</body>