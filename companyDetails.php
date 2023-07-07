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
          <div class="headline">
            <span class="icon-container">
              <i class="fa-solid fa-circle-exclamation"></i>
            </span>
            <h3>About Company Details</h3>
          </div>
          <div class="image-container">
            <img src="./assets/images/browseCompany.jpg" alt="">
          </div>
          <div class="company-about">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae sit vero excepturi! Consequuntur molestias deleniti delectus sapiente praesentium quo nulla eaque. Deserunt nobis incidunt eligendi aspernatur voluptatibus accusantium commodi nulla qui saepe consequatur facere doloribus dolores veritatis quas adipisci natus, earum iure accusamus? Incidunt natus corporis illo. Iusto ad quod numquam libero commodi, quibusdam possimus error nemo labore earum quas quo et enim sed rem odit, delectus ipsa. Exercitationem molestias sequi alias magni libero praesentium totam blanditiis obcaecati atque dignissimos repellat asperiores, eaque assumenda accusantium voluptatibus molestiae sint maxime et tempore id magnam vitae! Modi aspernatur rerum maiores quia minima.</p>
          </div>
        </div>
        <div class="company-details-page-content-right-side">
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