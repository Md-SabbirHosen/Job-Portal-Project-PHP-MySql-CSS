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
      <?php
      $id_company  = $_SESSION['id_company'];

      $sql = "SELECT * from job_post where id_company = '$id_company' order by id_jobpost desc";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {
        $id_jobpost = $row['id_jobpost'];
        $jobtitle = $row['jobtitle'];
        $city_id = $row['city_id'];
        $industry_id = $row['industry_id'];
        $job_status_id = $row['job_status'];
        $minimum_salary = $row['minimumsalary'];
        $maximum_salary = $row['maximumsalary'];
        $create_date = $row['createdat'];
        $location = $conn->query("SELECT name from districts_or_cities where id = '$city_id'");
        $job_category = $conn->query("SELECT name from industry where id = '$industry_id'");
        $job_type = $conn->query("SELECT type from job_type where id = '$job_status_id'");
        $profile_pic = $conn->query("SELECT profile_pic from company where id_company = '$id_company'");

        $hash = md5($id_jobpost);

        $location = $location->fetch_assoc();
        $job_category = $job_category->fetch_assoc();
        $job_type = $job_type->fetch_assoc();
        $profile_pic = $profile_pic->fetch_assoc();
      ?>
        <div class="job-item-container">
          <div class="profile-container">
            <img src="../assets/images/<?php echo $profile_pic['profile_pic'] ?>" alt="">
          </div>
          <div class="job-info-container">
            <div class="job-info-upper-area">
              <span class=" validity-active">Active</span>
              <div class="activity-container">
                <a href="../jobDetails.php?key=<?php echo $hash . '&id=' . $id_jobpost ?>"><i class="fa-solid fa-eye"></i></a>
                <a><i class="fa-solid fa-pen-to-square"></i></a>
                <a><i class="fa-solid fa-trash"></i></a>
              </div>
            </div>
            <div class="title-with-job-status">
              <h3> <?php echo $jobtitle; ?> </h3>
              <div class="job-status">
                <i class="fa-solid fa-briefcase"></i>
                <span><?php echo $job_type['type'] ?></span>
              </div>
            </div>
            <div class="others-info">
              <div class="job-category-info">
                <i class="fa-solid fa-briefcase"></i>
                <span><?php echo $job_category['name'] ?></span>
              </div>
              <div class="date-info">
                <i class="fa-solid fa-calendar-days"></i>
                <span><?php echo $create_date; ?></span>
              </div>
              <div class="salary-info">
                <i class="fa-solid fa-money-check-dollar"></i>
                <span><?php echo $minimum_salary . "-" . $maximum_salary ?></span>
              </div>
              <div class="location-info">
                <i class="fa-solid fa-location-dot"></i>
                <span><?php echo $location['name'] ?></span>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</body>