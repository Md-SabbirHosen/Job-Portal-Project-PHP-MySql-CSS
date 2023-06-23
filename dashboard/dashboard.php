<?php include "../includes/conn.php" ?>
<?php include "../includes/indexHeader.php"; ?>

<body>
  <?php include "../includes/indexNavbar.php"; ?>

  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php"; ?>
    <div class="dashboard-content-container">
      <?php if (($_SESSION['role_id']) == 1) : ?>
        <div class="container-box">
          <div class="icon">
            <i class="fa-solid fa-briefcase"></i>
          </div>
          <h1>
            <?php
            $id_user = $_SESSION['id_user'];
            $sql  = "select * from applied_jobposts where id_user = '$id_user'";
            $query = $conn->query($sql);
            echo $query->num_rows;
            ?>
          </h1>
          <span>Applied Jobs</span>
        </div>
        <div class="container-box">
          <div class="icon">
            <i class="fa-sharp fa-solid fa-heart"></i>
          </div>
          <h1>
            <?php
            $id_user = $_SESSION['id_user'];
            $sql  = "select * from saved_jobposts where id_user = '$id_user'";
            $query = $conn->query($sql);
            echo $query->num_rows;
            ?>

          </h1>
          <span>Saved Jobs</span>
        </div>

      <?php endif; ?>
    </div>
  </div>

</body>