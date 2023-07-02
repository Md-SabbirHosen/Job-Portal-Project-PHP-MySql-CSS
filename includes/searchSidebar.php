<div class="sidebar-container">
  <div class="keyword-search-container">
    <div class="search-form-container">
      <form method="post" action="../process/changePassword.php">
        <div class="input-group">
          <label for="search-keyword">Search Keywords</label>
          <div class="line line-light line-light-left"></div>
          <div class="search-input-wrapper">
            <input type="search" name="searchKeyword" placeholder="Search Keywords..." required>
            <button type="submit" name="submitSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="location-search-container">
    <div class="search-form-container">
      <form method="post" action="../process/changePassword.php">
        <div class="input-group">
          <label for="location-keyword">Location</label>
          <div class="line line-light line-light-left"></div>
          <div class="select-container">
            <select id="select-category" name="city" required>
              <?php
              if ($city_id !== null && $city_id != 0) {
                echo '<option value="' . $city_id . '" selected>' . $row2['name'] . '</option>';
              } else {
                echo '<option value="">All Location</option>';
              }
              $districtOrCitySql = "SELECT * from districts_or_cities";
              $districtOrCityQuery = $conn->query($districtOrCitySql);
              while ($districtOrCity = $districtOrCityQuery->fetch_assoc()) {
              ?>
                <option value="<?php echo $districtOrCity['id'] ?>"><?php echo $districtOrCity['name'] ?></option>
              <?php } ?>
            </select>
            <span class="custom-arrow"></span>
          </div>
        </div>
        <button type="submit" class="btn" name="submitSearch">Search</button>
      </form>
    </div>
  </div>
  <div class="category-search-container">
    <div class="search-form-container">
      <form method="post" action="../process/changePassword.php">
        <div class="input-group">
          <label for="category-keyword">All Categories</label>
          <div class="line line-light line-light-left"></div>
          <div class="select-container">
            <select id="select-category" name="career" required>
              <?php
              if ($industry_id !== null && $industry_id != 0) {
                echo '<option value="' . $industry_id . '" selected>' . $row4['name'] . '</option>';
              } else {
                echo '<option value="">Select Categories</option>';
              }
              $jobCategorySql = "SELECT * from industry";
              $jobCategoryQuery = $conn->query($jobCategorySql);
              while ($jobCategory = $jobCategoryQuery->fetch_assoc()) {
              ?>
                <option value="<?php echo $jobCategory['id'] ?>"><?php echo $jobCategory['name'] ?></option>
              <?php } ?>
            </select>
            <span class="custom-arrow"></span>
          </div>
        </div>
        <button type="submit" class="btn" name="submitSearch">Search</button>
      </form>
    </div>
  </div>
  <div class="job-type-search-container">
    <div class="search-form-container">
      <form method="post" action="../process/changePassword.php">
        <div class="input-group">
          <label for="type-keyword">Job Type</label>
          <div class="line line-light line-light-left"></div>
          <div class="select-container">
            <select id="select-category" name="job_type" required>
              <?php
              if ($jobType_id !== null && $jobType_id != 0) {
                echo '<option value="' . $jobType_id . '" selected>' . $row4['name'] . '</option>';
              } else {
                echo '<option value="">All Job Types</option>';
              }
              $jobTypeSql = "SELECT * from job_type";
              $jobTypeQuery = $conn->query($jobTypeSql);
              while ($jobType = $jobTypeQuery->fetch_assoc()) {
              ?>
                <option value="<?php echo $jobType['id'] ?>"><?php echo $jobType['type'] ?></option>
              <?php } ?>
            </select>
            <span class="custom-arrow"></span>
          </div>
        </div>
        <button type="submit" class="btn" name="submitSearch">Search</button>
      </form>
    </div>
  </div>
</div>