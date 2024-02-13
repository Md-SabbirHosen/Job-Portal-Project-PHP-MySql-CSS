<?php include "./includes/conn.php" ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php" ?>
  <?php include "./includes/indexChat.php" ?>
<<<<<<< HEAD

=======
>>>>>>> 855222a9586480ae4177774b99d69f0ccaac4eff
  <div id="home-page">
    <!-- Intro Banner -->
    <div class="intro-banner">
      <div class="intro-banner-overlay">
        <div class="intro-banner-content">
          <div class="container  glassmorphism">
            <div class="banner-headline-text-part">
              <h3>Welcome to Our Job Portal</h3>
              <div class="line line-dark"></div>
              <p> Find your dream job. Explore exciting opportunities.</p>
              <div>
                <a href="" class="btn btn-secondary">Browse Job Listings</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Icon Boxes -->
    <section id="icon-boxes">
      <div class="container">
        <div class="icon-boxes-content">
          <div class="upper-side">
            <div class="section-headline-item">
              <h2>How It Works?</h2>
              <div class="line"></div>
              <p class="slogan-text">Discover the Power of Our Job Portal</p>
            </div>
          </div>
          <div class="bottom-side">
            <div class="icon-box">
              <div class="icon-box-circle">
                <div class="icon-box-circle-inner"><i class="fa-solid fa-user-plus"></i></div>
              </div>
              <h3>Create Account</h3>
              <p>Create your account and get access to a world of job opportunities.</p>
            </div>
            <div class="icon-box">
              <div class="icon-box-circle">
                <div class="icon-box-circle-inner"><i class="fa-solid fa-file-arrow-up"></i></i></div>
              </div>
              <h3>Upload Resume</h3>
              <p>Showcase your skills and experience by uploading your resume.</p>
            </div>
            <div class="icon-box">
              <div class="icon-box-circle">
                <div class="icon-box-circle-inner"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              </div>
              <h3>Search Jobs</h3>
              <p>Find your desired jobs using our advanced search options</p>
            </div>
            <div class="icon-box">
              <div class="icon-box-circle">
                <div class="icon-box-circle-inner"><i class="fa-solid fa-floppy-disk"></i></div>
              </div>
              <h3>Save & Apply</h3>
              <p>Save interesting job listings and apply with ease.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Browse Companies and Browse Jobs -->
    <section>
      <div class="browse-content">
        <div class="left-side">
          <div class="left-side-overlay">
            <div class="left-side-overlay-content">
              <h2>Find Your Browse Companies</h2>
              <div class="line line-dark"></div>
              <p>Explore a wide range of companies and their profiles to find the perfect fit for your career. Discover new opportunities and unlock your potential.</p>
              <a href="" class="btn btn-secondary">Browse Companies </a>
            </div>
          </div>
        </div>
        <div class="right-side">
          <div class="right-side-overlay">
            <div class="right-side-overlay-content">
              <h2>Find Your Browse Jobs</h2>
              <div class="line line-dark"></div>
              <p>Discover exciting job opportunities in various industries. Search through our extensive job listings and take the next step in your career journey.</p>
              <a href="" class="btn btn-secondary">Browse Jobs </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Counters -->
    <section id="counter-boxes">
      <div class="container">
        <div class="counter-boxes-content">
          <div class="upper-side">
            <div class="section-headline-item">
              <h2>Our Success</h2>
              <div class="line"></div>
              <p class="slogan-text">Connecting job seekers and employers, revolutionizing the way people find their dream careers</p>
            </div>
          </div>
          <div class="bottom-side">
            <div class="counter-box">
              <div class="counter-box-circle">
                <div class="counter-box-circle-inner"><i class="fa-solid fa-briefcase"></i></div>
              </div>
              <div class="counter-inner-item">
                <h3>
                  <span class="counter">
                    <?php $sql = "select * from applied_jobposts";
                    $query = $conn->query($sql);
                    echo "<h3>" . $query->num_rows . "</h3>";  ?>
                  </span>
                </h3>
                <p class="counter-title">Jobs</p>
              </div>
            </div>
            <div class="counter-box">
              <div class="counter-box-circle">
                <div class="counter-box-circle-inner"><i class="fa-solid fa-users"></i></div>
              </div>
              <div class="counter-inner-item">
                <h3>
                  <span class="counter">
                    <?php $sql = "select * from users";
                    $query = $conn->query($sql);
                    echo "<h3>" . $query->num_rows . "</h3>"; ?>
                  </span>
                </h3>
                <p class="counter-title">Jobs Candidate</p>
              </div>
            </div>
            <div class="counter-box">
              <div class="counter-box-circle">
                <div class="counter-box-circle-inner"><i class="fa-sharp fa-solid fa-building"></i></div>
              </div>
              <div class="counter-inner-item">
                <h3>
                  <span class="counter">
                    <?php $sql = "select * from company";
                    $query = $conn->query($sql);
                    echo "<h3>" . $query->num_rows . "</h3>"; ?>
                  </span>
                </h3>
                <p class="counter-title">Companies</p>
              </div>
            </div>

          </div>
        </div>
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
  <script src="./assets/js/chatbot.js"></script>
</body>

</html>