<?php include "./includes/conn.php" ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php" ?>

  <div id="find-jobs-page">
    <div class="intro-banner">
      <div class="intro-banner-overlay">
        <div class="intro-banner-content">
          <div class="container">
            <div class="banner-headline-text-part">
              <h3>Find Nearby Jobs</h3>
              <div class="keywords">
                <p>Trending Jobs Keywords:</p>
                <span> Nurse, Architect, Graphic Designer, Teller, Electrical Engineer, Android Developer</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="page-content">
      <div class="page-content-left-side">
        <?php include "./includes/searchSidebar.php" ?>
      </div>
      <div class="page-content-right-side">
        <div class="headline">
          <span class="icon-container">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
          <h3>Jobs Listing Results</h3>
        </div>
        <?php

        $sql = "SELECT * from job_post  order by createdat desc";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          $id_company = $row['id_company'];
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
              <span class="validity-info">Active</span>
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
    </section>

    <!-- Footer -->
    <div id="footer">
      <!-- Footer Widgets -->
      <?php include 'includes/indexFooterWidgets.php';
      ?>
      <!-- Footer Copyrights -->
      <?php include 'includes/footer.php' ?>
    </div>
  </div>
</body>