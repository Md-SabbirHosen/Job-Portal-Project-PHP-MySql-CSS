<?php include "../includes/conn.php" ?>
<?php include "../includes/indexHeader.php"; ?>

<body>
  <?php include "../includes/indexNavbar.php"; ?>
  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php"; ?>
    <div class="resume-content-container">
      <?php if (($_SESSION['role_id'] == 1)) :
        $id_user = $_SESSION['id_user'];
        $sql = "select resume from users where id_user = '$id_user'";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
      ?>
        <div class="resume-content-container-left-side">
          <div class="headline">
            <h3>My Resume</h3>
          </div>
          <div class="resume-container">
            <?php if ($row['resume'] == '') : ?>
              <p>No Resume!! Please Upload.</p>
            <?php else : ?>
              <a href="../assets/resume/<?php echo $row['resume'] ?>" target="_blank" class="btn btn-secondary">View Resume</a>
            <?php endif; ?>
          </div>
        </div>
        <div class="resume-content-container-right-side">
          <div class="headline">
            <h3>Change Resume</h3>
          </div>
          <div class="upload-resume-container">
            <img src="../assets/images/pdf.png" alt="" />
            <form method="POST" action="../process/changeResume.php" enctype="multipart/form-data">
              <input name="resume" type="file" accept=".pdf" required="">
              <button type="submit" class="btn btn-secondary" name="changeResume">Changes Resume</a>
            </form>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
</body>