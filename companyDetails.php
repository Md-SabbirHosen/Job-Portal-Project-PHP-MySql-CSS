<?php include "./includes/conn.php" ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php" ?>
  <?php if (isset($_GET['key']) && isset($_GET['id'])) :
    $company_id = $_GET['id'];

    $sql = "SELECT * FROM company WHERE id_company='$company_id'";
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
            <div class="container">
              <div class="banner-headline-text-part glassmorphism">
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