<?php include 'includes/indexHeader.php'; ?>

<body>

  <?php include 'includes/indexNavbar.php' ?>

  <!-- Page content -->
  <div class="container">
    <div class="modal-content ">
      <div class="signin-form-part">
        <ul class="popup-tabs-nav-item">
          <li><a href="#login">Log In</a></li>
          <li><a href="#register">Register</a></li>
        </ul>

        <div class="popup-container-part-tabs">
          <!-- Login -->
          <div class="popup-tab-content-item" id="login">
            <div class="welcome-text-item">
              <h3>Welcome Back Sign in to Continue</h3>
              <span>Don't Have an Account? <a href="#" class="register-tab">Sign Up!</a></span>
            </div>
            <form method="post" id="login-form" action="./process/login.php">
              <div class="input-group ">
                <div class="select-container">
                  <select id="select-category" name="acctype">
                    <option value="Applicant">Job Seeker/Applicant</option>
                    <option value="Employer">Employer</option>
                    <option value="Admin">Admin</option>
                  </select>
                  <span class="custom-arrow"></span>
                </div>
              </div>
              <div class="input-group ">
                <input type="email" name="email" id="email" placeholder="Email Address" required />
              </div>
              <div class="input-group ">
                <input type="password" name="password" id="password" placeholder="Password" required minlength="6" />
              </div>
            </form>
            <button class="btn btn-secondary-form" type="submit" form="login-form" name="loginbtn">Log In </button>
          </div>

          <!-- Register -->
          <div class="popup-tab-content-item" id="register">
            <div class="welcome-text-item">
              <h3>Create your Account!</h3>
              <span>Already Have an Account? <a href="#" class="login-tab">Log In!</a></span>
            </div>
            <form method="post" id="register-account-form" action="./process/register.php">
              <div class="input-group ">
                <div class="select-container">
                  <select id="select-category" name="acctype">
                    <option value="Applicant">Job Seeker/Applicant</option>
                    <option value="Employer">Employer</option>
                  </select>
                  <span class="custom-arrow"></span>
                </div>
              </div>
              <div class="input-group ">
                <input type="text" name="fullname" placeholder="Full Name / Company's Name" required />
              </div>
              <div class="input-group ">
                <input type="email" name="email" placeholder="Email Address" required />
              </div>
              <div class="input-group ">
                <input type="password" name="password" placeholder="Password" required minlength="6" />
              </div>
              <div class="input-group ">
                <input type="password" name="passwordrepeat" placeholder="Repeat Password" required minlength="6" />
              </div>
              <button class="btn btn-secondary-form" type="submit" id="regisbtn" name="registerbtn">Create an Account</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="footer">
    <!-- Footer Widgets -->
    <?php include 'includes/indexFooterWidgets.php';
    ?>
    <!-- Footer Copyrights -->
    <?php include 'includes/footer.php' ?>
  </div>


</body>


</html>