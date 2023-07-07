<?php include "./includes/conn.php" ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php" ?>
  <div id="browse-company-page">
    <div class="intro-banner">
      <div class="intro-banner-overlay">
        <div class="intro-banner-content">
          <div class="container glassmorphism">
            <div class="banner-headline-text-part">
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
        <?php include "./includes/searchSidebarCompany.php" ?>
      </div>

      <div class="page-content-right-side">
        <?php
        $sql = "SELECT * from company";
        $query = $conn->query($sql);
        while ($row = $query->fetch_assoc()) {
          $hash = md5($row['id_company']);
          $id_company = $row['id_company'];
          $industry_id = $row['industry_id'];
          $state_id = $row['state_id'];
          $city_id = $row['city_id'];

          $industry = $conn->query("SELECT name from industry where id = '$industry_id'")->fetch_assoc();
          $division_or_state =
            $conn->query("SELECT name from states where id = '$state_id'")->fetch_assoc();
          $district_or_city = $conn->query("SELECT name from districts_or_cities where id = '$city_id'")->fetch_assoc();
        ?>
          <a href="./companyDetails.php?key=<?php echo $hash . '&id=' . $id_company ?>">
            <div class="company-item">
              <div class="profile-container">
                <img src="../assets/images/<?php echo $row['profile_pic'] ?>" alt="">
              </div>
              <div class="job-info-container">
                <h3> <?php echo $row['companyname'] ?> </h3>
                <div class="job-category-info">
                  <i class="fa-solid fa-briefcase"></i>
                  <span><?php echo $industry['name'] . " industry" ?></span>
                </div>
                <div class="location-info">
                  <i class="fa-solid fa-location-dot"></i>
                  <span><?php echo $division_or_state['name'] . ', ' . $district_or_city['name']; ?></span>
                </div>
              </div>
            </div>
          </a>

        <?php } ?>
      </div>
  </div>
  <!-- Footer -->
  <div id="footer">
    <!-- Footer Widgets -->
    <?php include 'includes/indexFooterWidgets.php';
    ?>
    <!-- Footer Copyrights -->
    <?php include 'includes/footer.php' ?>
  </div>
</body>