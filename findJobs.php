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
      <div class="page-content-right-side"></div>
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