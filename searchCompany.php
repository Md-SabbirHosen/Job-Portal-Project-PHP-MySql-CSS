<?php include "./includes/conn.php" ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php" ?>

  <div id="browse-company-page">
    <div class="intro-banner">
      <div class="intro-banner-overlay">
        <div class="intro-banner-content">
          <div class="container">
            <div class="banner-headline-text-part glassmorphism">
              <h3>Browse Companies</h3>
              <div class="line line-dark"></div>
              <span>Discover a diverse range of companies and explore their offerings. Whether you're seeking employment opportunities or looking to learn more about different industries, our curated list of companies has got you covered.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="page-content">
      <div class="page-content-left-side">
        <?php include "./includes/searchSidebarCompany.php"; ?>
      </div>
      <div class="page-content-right-side">
        <?php
        if (isset($_POST['submitSearch'])) {
          $sqlStatement = '';

          if (isset($_POST['location-search']) && $_POST['location-search'] != '') {
            $district_or_city_id = $_POST['location-search'];;
            $sqlStatement = "city_id = '$district_or_city_id'";
          }

          if (isset($_POST['category-search']) && $_POST['category-search'] != '') {
            $industry_id = $_POST['category-search'];
            $sqlStatement = "industry_id = '$industry_id'";
          }

          if ($sqlStatement == '') {
            $sql = "SELECT * FROM company ORDER BY createdAt DESC";
          } else {
            $sql = "SELECT * FROM company WHERE " . $sqlStatement . " ORDER BY createdAt DESC";
          }

          $query = $conn->query($sql);

          if ($query->num_rows < 1) {
            echo '<div class="no-job-results">
                <p>No results found...</p> 
              </div>';
          } else {
            while ($row = $query->fetch_assoc()) {
              $hash = md5($row['id_company']);
              $id_company = $row['id_company'];
              $companyname = $row['companyname'];
              $city_id = $row['city_id'];
              $state_id = $row['state_id'];
              $industry_id = $row['industry_id'];
              $create_date = $row['createdAt'];
              $location = $conn->query("SELECT name FROM districts_or_cities WHERE id = '$city_id'")->fetch_assoc();
              $job_category = $conn->query("SELECT name FROM industry WHERE id = '$industry_id'")->fetch_assoc();
              $division_or_state =
                $conn->query("SELECT name FROM states WHERE id = '$state_id'")->fetch_assoc();
              $job_category = $conn->query("SELECT name FROM industry WHERE id = '$industry_id'")->fetch_assoc();

              $profile_pic = $conn->query("SELECT profile_pic FROM company WHERE id_company = '$id_company'")->fetch_assoc();
        ?>
              <a href="./companyDetails.php?key=<?php echo $hash . '&id=' . $id_company ?>">
                <div class="company-item">
                  <div class="profile-container">
                    <img src="../assets/images/<?php echo $profile_pic['profile_pic'] ?>" alt="">
                  </div>
                  <div class="job-info-container">
                    <h3> <?php echo $companyname ?> </h3>
                    <div class="job-category-info">
                      <i class="fa-solid fa-briefcase"></i>
                      <span><?php echo $job_category['name'] . " industry" ?></span>
                    </div>
                    <div class="location-info">
                      <i class="fa-solid fa-location-dot"></i>
                      <span><?php echo $division_or_state['name'] . ", " . $location['name'] ?></span>
                    </div>
                  </div>
                </div>
              </a>
        <?php
            }
          }
        }
        ?>
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