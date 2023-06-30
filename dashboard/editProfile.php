<?php include "../includes/conn.php"; ?>
<?php include "../includes/indexHeader.php"; ?>

<body>
  <?php include "../includes/indexNavbar.php"; ?>

  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php"; ?>
    <div class="dashboard-inner-container">
      <div class="edit-jobseeker-profile-content-container">
        <?php if (($_SESSION['role_id']) == 1) :
          $id_user = $_SESSION['id_user'];
          $sql = "select * from users where id_user='$id_user'";
          $query = $conn->query($sql);
          $row = $query->fetch_assoc();

          // states info
          $state_id = $row['state_id'];
          $sql1 = "SELECT * from states where id = '$state_id'";
          $query1 = $conn->query($sql1);
          $row1 = $query1->fetch_assoc();

          // cities info
          $city_id = $row['city_id'];
          $sql2 = "SELECT * from cities where id = '$city_id'";
          $query2 = $conn->query($sql2);
          $row2 = $query2->fetch_assoc();

          // careers info
          $career_id = $row['career_id'];
          $sql3 = "SELECT * from career where id = $career_id";
          $query3 = $conn->query($sql3);
          $row3 = $query3->fetch_assoc();

          // education info
          $education_id = $row['education_id'];
          $sql4 = "SELECT * from education where id='$education_id'";
          $query4 = $conn->query($sql4);
          $row4 = $query4->fetch_assoc();
        ?>
          <div class="edit-profile-content-container-left-side">
            <div class="headline">
              <h3>My Profile Details</h3>
            </div>
            <div class="change-details-container">
              <div class="change-image-container">
                <?php if ($row['profile_pic'] != '') :
                ?>
                  <img class="profile-pic" src="../assets/images/<?php echo $row['profile_pic'] ?>" alt="" />
                <?php else : ?>
                  <img class="profile-pic" src="../assets/images/user.png" alt="" />
                <?php endif; ?>
              </div>
              <form method="post" class="change-image-form" action="../process/changePic.php" enctype="multipart/form-data">
                <input class="file-upload" type="file" name="picture" accept="image/*">
                <button type="submit" class="btn btn-secondary" name="myPic">Changes Profile Picture</button>
              </form>
            </div>
            <div class="edit-details-form">
              <form action="../process/changeProfile.php" method="post">
                <div class="input-group">
                  <label for="fullName">Full Name</label>
                  <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required>
                </div>
                <div class="input-group">
                  <label for="email">Email Address</label>
                  <input type="email" name="email" value="<?php echo $row['email'] ?>" required>
                </div>
                <div class="input-group">
                  <label for="about">About</label>
                  <textarea name="aboutme" cols="30" rows="10" required><?php echo $row['aboutme'] ?></textarea>
                </div>
                <div class="input-group">
                  <label for="headline">Headline</label>
                  <input type="text" name="headline" value="<?php echo $row['headline'] ?>" placeholder="Position e.g Software Engineer" required>
                </div>
                <div class="input-group">
                  <label for="phoneNumber">Phone Number</label>
                  <input type="text" name="phoneno" value="<?php echo $row['contactno'] ?>" required>
                </div>
                <div class="input-group">
                  <label for="dateOfBirth">Date of Birth</label>
                  <input type="date" name="dob" value="<?php echo $row['dob'] ?>" required>
                </div>
                <div class="input-group">
                  <label for="gender">Gender</label>
                  <input type="text" name="gender" value="<?php echo $row['gender'] ?>" required>
                </div>
                <div class="input-group">
                  <label for="divisionOrState">Division/State</label>
                  <?php if (isset($row1['name']) && $row1['name'] != '') : ?>
                    <input type="text" name="region" value="<?php echo $row1['name'] ?>" required>
                  <?php else : ?>
                    <input type="text" name="region" required>
                  <?php endif; ?>
                </div>
                <div class="input-group">
                  <label for="cityOrDistrict">City/District</label>
                  <?php if (isset($row1['name']) && $row1['name'] != '') : ?>
                    <input type="text" name="city" value="<?php echo $row2['name'] ?>" required>
                  <?php else : ?>
                    <input type="text" name="city" required>
                  <?php endif; ?>
                </div>
                <div class="input-group">
                  <label for="residentialAddress">Residential Address</label>
                  <input type="text" name="address" value="<?php echo $row['address'] ?>" required>
                </div>
                <div class="input-group">
                  <label for="highesteducation">Highest Education</label>
                  <?php if (isset($row3['name']) && $row3['name'] != '') : ?>
                    <input type="text" name="education" value="<?php echo $row3['name'] ?>" required>
                  <?php else : ?>
                    <input type="text" name="education" required>
                  <?php endif ?>
                </div>
                <div class="input-group">
                  <label for="careerIndustry">Career Industry</label>
                  <?php if (isset($row3['name']) && $row3['name'] != '') : ?>
                    <input type="text" name="career" value="<?php echo $row4['name'] ?>" required>
                  <?php else : ?>
                    <input type="text" name="career" required>
                  <?php endif; ?>
                </div>
                <div class=" input-group">
                  <label for="skills">Skills</label>
                  <textarea name="skills" cols="30" rows="5" required>
                <?php echo $row['skills'] ?>
              </textarea>
                </div>
                <div class="button-container">
                  <button type="submit" name="myProfile" class="btn btn-secondary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
          <div class="edit-profile-content-container-right-side">

            <div class="password-container">
              <div class="headline">
                <h3>Change Password</h3>
              </div>
              <div class="change-password-container">
                <form method="post" action="../process/changePassword.php">
                  <div class="input-group">
                    <label for="new-password">New Password</label>
                    <input name="newPassword" type="password" minlength="6" placeholder="New Password" required>
                  </div>
                  <div class="input-group">
                    <label for="confirm-newPassword">Confirm New Password</label>
                    <input type="password" minlength="6" placeholder="Confirm New Password" required>
                  </div>
                  <button type="submit" name="myPassword" class="btn btn-secondary">Changes Password</button>
                </form>
              </div>
            </div>
            <div class="deactivate-container">
              <div class="headline">
                <h3>Deactivate Account</h3>
              </div>
              <div class="deactivate-button-container">
                <form action="" method="post">
                  <div class="button-container">
                    <button type="submit" name="" class="btn btn-secondary">Deactivate Account</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    <?php endif; ?>
    </div>

    <div class="edit-company-profile-content-container">
      <?php if (($_SESSION['role_id']) == 2) :
        $id_company = $_SESSION['id_company'];
        $sql = "select * from company where id_company='$id_company'";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();

        // states info
        $state_id = $row['state_id'];
        $sql1 = "SELECT * from states where id = '$state_id'";
        $query1 = $conn->query($sql1);
        $row1 = $query1->fetch_assoc();

        // cities info
        $city_id = $row['city_id'];
        $sql2 = "SELECT * from districts_or_cities where id = '$city_id'";
        $query2 = $conn->query($sql2);
        $row2 = $query2->fetch_assoc();

        //getting industry info
        $industry_id = $row['industry_id'];
        $sql3 =  "SELECT * FROM industry WHERE id = '$industry_id'";
        $query3 = $conn->query($sql3);
        $row3 = $query3->fetch_assoc();

        // education info
        // $education_id = $row['education_id'];
        // $sql4 = "SELECT * from education where id='$education_id'";
        // $query4 = $conn->query($sql4);
        // $row4 = $query4->fetch_assoc();
      ?>
        <div class="edit-profile-content-container-left-side">
          <div class="headline">
            <h3>Profile Details</h3>
          </div>
          <div class="change-details-container">
            <div class="change-image-container">
              <?php if ($row['profile_pic'] != '') :
              ?>
                <img class="profile-pic" src="../assets/images/<?php echo $row['profile_pic'] ?>" alt="" />
              <?php else :
              ?>
                <img class="profile-pic" src="../assets/images/user.png" alt="" />
              <?php endif;
              ?>
            </div>
            <form method="post" class="change-image-form" action="../process/changePic.php" enctype="multipart/form-data">
              <input class="file-upload" type="file" name="picture" accept="image/*">
              <button type="submit" class="btn btn-secondary" name="companyPic">Changes Profile Picture</button>
            </form>
          </div>
          <div class="edit-details-form">
            <form action="../process/changeProfile.php" method="post">
              <div class="input-group">
                <label for="fullName">Company's Name</label>
                <input type="text" name="companyname" value="<?php echo $row['companyname']; ?>" required>
              </div>
              <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" value="<?php echo $row['email'] ?>" required>
              </div>
              <div class="input-group">
                <label for="about">About Me</label>
                <textarea name="aboutme" cols="30" rows="10" required><?php echo $row['aboutme'] ?></textarea>
              </div>
              <div class="input-group">
                <label for="industry">Industry</label>
                <div class="select-container">
                  <select id="select-category" name="industry" required>
                    <?php
                    ?>
                    <!-- <option value="<?php //echo $industry_id 
                                        ?>" selected=""><?php //echo $row3['name'] 
                                                        ?></option> -->
                    <?php
                    if ($industry_id !== null) {
                      echo '<option value="' . $industry_id . '" selected>' . $row3['name'] . '</option>';
                    } else {
                      echo '<option value="">Select Industry</option>';
                    }
                    $industrySql = "SELECT * from industry";
                    $industryQuery = $conn->query($industrySql);
                    while ($industry = $industryQuery->fetch_assoc()) {
                    ?>
                      <option value="<?php echo $industry['id'] ?>"><?php echo $industry['name'] ?></option>
                    <?php } ?>
                  </select>
                  <span class="custom-arrow"></span>
                </div>
              </div>
              <div class="input-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" name="phoneno" value="<?php echo $row['contactno'] ?>" required>
              </div>
              <div class="input-group">
                <label for="dateOfBirth">Date of Establishment</label>
                <input type="date" name="esta_date" value="<?php echo $row['esta_date'] ?>" required>
              </div>
              <div class="input-group">
                <label for="employees">No. of Employees</label>
                <input type="number" name="empno" value="<?php echo $row['empno'] ?>" required>
              </div>
              <div class="input-group">
                <label for="divisionOrState">Division/State</label>
                <div class="select-container">
                  <select id="select-category" name="region" required>
                    <?php
                    if ($state_id !== null) {
                      echo '<option value="' . $state_id . '" selected>' . $row1['name'] . '</option>';
                    } else {
                      echo '<option value="">Select Division/State</option>';
                    }
                    $divisionSql = "SELECT * from states";
                    $divisionQuery = $conn->query($divisionSql);
                    while ($division = $divisionQuery->fetch_assoc()) {
                    ?>
                      <option value="<?php echo $division['id'] ?>"><?php echo $division['name'] ?></option>
                    <?php } ?>
                  </select>
                  <span class="custom-arrow"></span>
                </div>
              </div>
              <div class="input-group">
                <label for="cityOrDistrict">City/District</label>
                <div class="select-container">
                  <select id="select-category" name="city" required>
                    <option value="<?php echo $city_id ?>" selected=""><?php echo $row2['name'] ?></option>
                    <?php $districtOrCitySql = "SELECT * from districts_or_cities";
                    $districtOrCityQuery = $conn->query($districtOrCitySql);
                    while ($districtOrCity = $districtOrCityQuery->fetch_assoc()) {
                    ?>
                      <option value="<?php echo $districtOrCity['id'] ?>"><?php echo $districtOrCity['name'] ?></option>
                    <?php } ?>
                  </select>
                  <span class="custom-arrow"></span>
                </div>
              </div>
              <div class="input-group">
                <label for="residentialAddress">Office Address</label>
                <input type="text" name="address" value="<?php echo $row['address'] ?>" required>
              </div>
              <div class="input-group">
                <label for="websitelink">Website link</label>
                <input type="text" name="website" value="<?php echo $row['website'] ?>" required>
              </div>
              <div class="button-container">
                <button type="submit" name="companyProfile" class="btn btn-secondary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>

        <div class="edit-profile-content-container-right-side">
          <div class="password-container">
            <div class="headline">
              <h3>Change Password</h3>
            </div>
            <div class="change-password-container">
              <form method="post" action="../process/changePassword.php">
                <div class="input-group">
                  <label for="new-password">New Password</label>
                  <input name="newPassword" type="password" minlength="6" placeholder="New Password" required>
                </div>
                <div class="input-group">
                  <label for="confirm-newPassword">Confirm New Password</label>
                  <input type="password" placeholder="Confirm New Password" minlength="6" required>
                </div>
                <button type="submit" name="companyPassword" class="btn btn-secondary">Changes Password</button>
              </form>
            </div>
          </div>
          <div class="deactivate-container">
            <div class="headline">
              <h3>Deactivate Account</h3>
            </div>
            <div class="deactivate-button-container">
              <form action="" method="post">
                <div class="button-container">
                  <button type="submit" name="" class="btn btn-secondary">Deactivate Account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  </div>
</body>