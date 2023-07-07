<?php include "./includes/conn.php" ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php" ?>
  <?php if (isset($_GET['key']) && isset($_GET['id'])) :
    $id_company = $_GET['id'];

    $sql = "SELECT * FROM company WHERE id_company='$id_company'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    //getting state info
    $division_or_state_id = $row['state_id'];
    $sql1 =  "SELECT * FROM states WHERE id = '$division_or_state_id'";
    $query1 = $conn->query($sql1);
    $row1 = $query1->fetch_assoc();

    //getting city info
    $district_or_city_id = $row['city_id'];
    $sql2 =  "SELECT * FROM districts_or_cities WHERE id = '$district_or_city_id'";
    $query2 = $conn->query($sql2);
    $row2 = $query2->fetch_assoc();

    //getting industry info
    $industry_id = $row['industry_id'];
    $sql3 =  "SELECT * FROM industry WHERE id = '$industry_id'";
    $query3 = $conn->query($sql3);
    $row3 = $query3->fetch_assoc();

  ?>
    <div id="browse-company-details">
      <div class="intro-banner">
        <div class="intro-banner-overlay">
          <div class="intro-banner-content">
            <div class="container glassmorphism">
              <div class="banner-headline-text-part">
                <div class="profile-container">
                  <img src="../assets/images/<?php echo $row['profile_pic'] ?>" alt="">
                </div>
                <div class="job-info-container">
                  <h3> <?php echo $row['companyname'] ?> </h3>
                  <div class="job-category-info">
                    <i class="fa-solid fa-briefcase"></i>
                    <span><?php echo $row3['name'] . " industry" ?></span>
                  </div>
                  <div class="location-info">
                    <i class="fa-solid fa-location-dot"></i>
                    <span><?php echo $row1['name'] . ", " . $row2['name'] ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="company-details-page-content">
        <div class="company-details-page-content-left-side">
          <div class="company-details-page-content-left-side-about">
            <div class="headline">
              <span class="icon-container">
                <i class="fa-solid fa-circle-exclamation"></i>
              </span>
              <h3>About Company Details</h3>
            </div>
            <div class="image-container">
              <img src="./assets/images/aboutCompany.jpg" alt="">
            </div>
            <div class="company-about">
              <span><?php echo $row['aboutme'] ?></span>
            </div>
          </div>
          <div class="company-details-page-content-left-side-jobpost">
            <div class="headline">
              <span class="icon-container">
                <i class="fa-solid fa-briefcase"></i>
              </span>
              <h3>Company Jobs Posts</h3>
            </div>
            <?php
            $sql = "SELECT * from job_post  where id_company = '$id_company' ";
            $result = $conn->query($sql);

            while ($row4 = $result->fetch_assoc()) {
              $jobtitle = $row4['jobtitle'];
              $city_id = $row4['city_id'];
              $industry_id = $row4['industry_id'];
              $job_status_id = $row4['job_status'];
              $minimum_salary = $row4['minimumsalary'];
              $maximum_salary = $row4['maximumsalary'];
              $create_date = $row4['createdat'];
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
                    $deadline = date_create($row4['deadline']);
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
            <?php }
            ?>
          </div>
        </div>

        <div class="company-details-page-content-right-side">
          <div class="information-wrapper">
            <div class="information-container">
              <div class="headline">
                <h3>More Information</h3>
              </div>
              <ul class="information-list-container">
                <li class="information-list-item">
                  <div class=" icon-container">
                    <i class="fa-solid fa-phone"></i>
                  </div>
                  <div class="info-container">
                    <span>Phone Number:</span>
                    <span><?php echo $row['contactno'] ?></span>
                  </div>
                </li>
                <li class="information-list-item">
                  <div class=" icon-container">
                    <i class="fa-solid fa-envelope"></i>
                  </div>
                  <div class="info-container">
                    <span>Email:</span>
                    <span><?php echo $row['email'] ?></span>
                  </div>
                </li>
                <li class="information-list-item">
                  <div class=" icon-container">
                    <i class="fa-solid fa-location-dot"></i>
                  </div>
                  <div class="info-container">
                    <span>Location:</span>
                    <span><?php echo $row2['name'] ?></span>
                  </div>
                </li>
                <li class="information-list-item">
                  <div class=" icon-container">
                    <i class="fa-solid fa-globe"></i>
                  </div>
                  <div class="info-container">
                    <span>Website:</span>
                    <span><?php echo $row['website'] ?></span>
                  </div>
                </li>
                <li class="information-list-item">
                  <div class=" icon-container">
                    <i class="fa-solid fa-building"></i>
                  </div>
                  <div class="info-container">
                    <span>Established:</span>
                    <span><?php echo $row['esta_date'] ?></span>
                  </div>
                </li>
              </ul>
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