<?php include "../includes/conn.php"; ?>
<?php include "../includes/indexHeader.php"; ?>

<body>
  <?php include "../includes/indexNavbar.php"; ?>

  <div class="dashboard-container">
    <?php include "../dashboard/dashboardSidebar.php" ?>

    <div class="add-job-container">
      <div class="add-job-content-container">
        <div class="headline">
          <h3>Add New Job</h3>
        </div>
        <form class="job-form-container">
          <div class="input-group item-a">
            <label for="job-title">Job Title/Designation</label>
            <input type="text" placeholder="Job Title" name="jobtitle" required>
          </div>
          <div class="input-group item-b">
            <label for="job-title">Job Category</label>
            <input type="text" name="industry" required>
          </div>
          <div class="input-group  item-c">
            <label for="job-title">Job Type</label>
            <input type="text" name="job_type" required>
          </div>
          <div class="input-group  item-d">
            <label for="job-title">Experience (Years)</label>
            <input type="number" placeholder="Experience" min="0" required="" name="experience">
          </div>
          <div class="input-group  item-e">
            <label for="job-title">Edu. Qualification</label>
            <input type="text" name="edu_qualification" required>
          </div>
          <div class="input-group  item-f">
            <label for="job-title">Division/State</label>
            <input type="text" name="state" required>
          </div>
          <div class="input-group  item-g">
            <label for="job-title">District/City</label>
            <input type="text" name="city" required>
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
        </form>
      </div>

    </div>
  </div>
</body>