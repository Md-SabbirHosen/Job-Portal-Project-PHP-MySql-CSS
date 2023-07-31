<?php include "../includes/conn.php"; ?>

<?php include "../includes/indexHeader.php" ?>

<body>
  <?php include "../includes/indexNavbar.php" ?>
  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php" ?>
    <div class="view-applicants-container">
      <div class="headline">
        <h3>Applicants</h3>
      </div>
      <?php
      if (isset($_GET['id']) && isset($_GET['hash'])) {
        $id_company = $_SESSION['id_company'];
        $job = $_GET['id'];
      }
      $sql =  "SELECT * FROM applied_jobposts WHERE id_company = '$id_company' AND id_jobpost = '$job'";
      $query = $conn->query($sql);

      while ($row = $query->fetch_assoc()) {
        $id_user = $row['id_user'];
        $sql1 =  "SELECT * FROM users WHERE id_user = '$id_user'";
        $query1 = $conn->query($sql1);
        while ($row1 = $query1->fetch_assoc()) {
          $city_id = $row1['city_id'];
          $education = $row1['education_id'];
          $location = $conn->query("SELECT name FROM districts_or_cities WHERE id = '$city_id'");
          $education = $conn->query("SELECT name FROM education WHERE id = '$education'");
          $location = $location->fetch_assoc();
          $education = $education->fetch_assoc();
      ?>
          <div class="job-item-container">
            <div class="profile-container">
              <img src="../assets/images/<?php echo $row1['profile_pic'] ?>" alt="">
            </div>
            <div class="job-info-container">
              <div class="job-info-container-left-side">
                <div class="applicants-info">
                  <i class="fa-solid fa-user"></i>
                  <span><?php echo $row1['fullname'] ?></span>
                </div>
                <div class="email-info">
                  <i class="fa-solid fa-envelope"></i>
                  <span><?php echo $row1['email'] ?></span>
                </div>
                <div class="education-info">
                  <i class="fa-solid fa-building-columns"></i>
                  <?php if ($row1['education_id'] != '') : ?>
                    <span><?php echo $education["name"] ?></span>
                  <?php else : ?>
                    <span><?php echo "Unknown" ?></span>
                  <?php endif; ?>

                </div>
                <div class="others-info">
                  <div class="contact-info">
                    <i class="fa-solid fa-phone"></i>
                    <?php if ($row1['contactno'] != '') : ?>
                      <span><?php echo $row1['contactno'] ?></span>
                    <?php else : ?>
                      <span><?php echo "Unknown" ?></span>
                    <?php endif; ?>
                  </div>
                  <div class="location-info">
                    <i class="fa-solid fa-location-dot"></i>
                    <?php if ($row1['city_id'] != '') : ?>
                      <span><?php echo $location['name'] ?></span>
                    <?php else : ?>
                      <span><?php echo "Unknown" ?></span>
                    <?php endif; ?>

                  </div>
                </div>
              </div>
              <div class="job-info-container-right-side">
                <a href="../assets/resume/<?php echo $row1['resume'] ?>" class="btn">View Resume</a>
              </div>

            </div>
          </div>
      <?php }
      } ?>
    </div>
  </div>
  </div>
</body>