<?php include "../includes/conn.php"; ?>
<?php include "../includes/indexHeader.php"; ?>

<body>
  <?php include "../includes/indexNavbar.php"; ?>

  <div class="dashboard-container">
    <?php include "../dashboard/dashboardSidebar.php" ?>

    <div class="add-job-container">
      <div class="add-job-content-container">
        <div class="headline">
          <h3>Edit Job</h3>
        </div>
        <form class="job-form-container" method="post" action="../process/newJob.php">
          <div class="input-group item-a">
            <label for="job-title">Job Title/Designation</label>
            <input type="text" placeholder="Job Title" name="jobtitle" required>
          </div>
          <div class="input-group item-b">
            <label for="job-title">Job Category</label>
            <div class="select-container">
              <select id="select-category" name="industry">
                <?php $jobCategorySql = "SELECT * from industry";
                $jobCategoryQuery = $conn->query($jobCategorySql);
                while ($jobCategory = $jobCategoryQuery->fetch_assoc()) {
                ?>
                  <option value="<?php echo $jobCategory['id'] ?>"><?php echo $jobCategory['name'] ?></option>
                <?php } ?>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="input-group  item-c">
            <label for="job-type">Job Type</label>
            <div class="select-container">
              <select id="select-category" name="job_type">
                <?php $jobTypeSql = "SELECT * from job_type";
                $jobTypeQuery = $conn->query($jobTypeSql);
                while ($jobType = $jobTypeQuery->fetch_assoc()) {
                ?>
                  <option value="<?php echo $jobType['id'] ?>"><?php echo $jobType['type'] ?></option>
                <?php } ?>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="input-group  item-d">
            <label for="job-title">Experience (Years)</label>
            <input type="number" placeholder="Experience" min="0" required="" name="experience">
          </div>
          <div class="input-group  item-e">
            <label for="job-title">Edu. Qualification</label>
            <div class="select-container">
              <select id="select-category" name="edu_qualification">
                <?php $educationSql = "SELECT * from education";
                $educationQuery = $conn->query($educationSql);
                while ($education = $educationQuery->fetch_assoc()) {
                ?>
                  <option value="<?php echo $education['id'] ?>"><?php echo $education['name'] ?></option>
                <?php } ?>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="input-group  item-f">
            <label for="job-title">Division/State</label>
            <div class="select-container">
              <select id="select-category" name="division_or_state" required>
                <?php $divisionOrStateSql = "SELECT * from states";
                $divisionOrStateQuery = $conn->query($divisionOrStateSql);
                while ($divisionOrState = $divisionOrStateQuery->fetch_assoc()) {
                ?>
                  <option value="<?php echo $divisionOrState['id'] ?>"><?php echo $divisionOrState['name'] ?></option>
                <?php } ?>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="input-group  item-g">
            <label for="job-title">District/City</label>
            <div class="select-container">
              <select id="select-category" name="district_or_city">
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
          <div class="input-group  item-h">
            <label for="job-title">Minimum Salary</label>
            <input type="number" placeholder="Min Salary" min="0" name="minimumsalary" required>
          </div>
          <div class="input-group  item-i">
            <label for="job-title">Maximum Salary</label>
            <input type="number" placeholder="Max Salary" min="0" required="" name="maximumsalary">
          </div>
          <div class="input-group  item-j">
            <label for="job-title">Deadline</label>
            <input type="date" name="deadline" required>
          </div>
          <div class="input-group  item-k">
            <label for="job-title">Job Skills</label>
            <textarea cols="20" rows="5" placeholder="Skills..." name="skills" required=""></textarea>
          </div>
          <div class="input-group  item-l">
            <label for="job-title">Job Description</label>
            <textarea cols="20" rows="5" placeholder="Job Description..." required="" name="description"></textarea>
          </div>
          <div class="input-group  item-m">
            <label for="job-title">Responsibilities</label>
            <textarea cols="20" rows="5" placeholder="Responsibilites..." required="" name="responsibility"></textarea>
          </div>
          <div class="button-container item-n">
            <button type="submit" name="submitJob" class="btn btn-secondary">Submit Job</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</body>