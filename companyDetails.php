<?php include "./includes/conn.php" ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php" ?>
  <?php if (isset($_GET['key']) && isset($_GET['id'])) :
    $company_id = $_GET['id'];


  ?>
    <div id="browse-company-page">
      <div class="intro-banner">
        <div class="intro-banner-overlay">
          <div class="intro-banner-content">
            <div class="container">
              <div class="banner-headline-text-part">
                <div class="job-item-container">
                  <div class="profile-container">
                    <img src="../assets/images/<?php echo $profile_pic['profile_pic'] ?>" alt="">
                  </div>
                  <div class="job-info-container">
                    <div class="job-info-left-side">
                      <div class="job-status">
                        <i class="fa-solid fa-briefcase"></i>
                        <span><?php echo $job_type['type'] ?></span>
                      </div>
                      <h3> <?php echo $jobtitle; ?> </h3>
                      <div class="others-info">
                        <div class="job-category-info">
                          <i class="fa-solid fa-briefcase"></i>
                          <span><?php echo $job_category['name'] ?></span>
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
                      <div class="date-info">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span><?php echo $create_date; ?></span>
                      </div>
                    </div>
                    <div class="job-info-right-side">
                      <?php
                      $deadline = date_create($row['deadline']);
                      $now = date_create(date("y-m-d"));

                      if ($now < $deadline) {
                        echo "<span class=" . "validity-active" . ">Active</span>";
                      } else {
                        echo "<span class=" . "validity-expired" . ">Expired</span>";
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php else :
    echo "No id is found";
  ?>


  <?php endif; ?>
  <!-- Footer -->
  <div id="footer">
    <!-- Footer Widgets -->
    <?php include 'includes/indexFooterWidgets.php';
    ?>
    <!-- Footer Copyrights -->
    <?php include 'includes/footer.php'
    ?>
  </div>
</body>