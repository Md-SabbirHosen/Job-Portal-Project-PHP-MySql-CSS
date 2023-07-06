<div class="sidebar-container">

  <div class="location-search-container">
    <div class="search-form-container">
      <form method="post" action="../searchCompany.php">
        <div class="input-group">
          <label for="location-keyword">Location</label>
          <div class="line line-light line-light-left"></div>
          <div class="select-container">
            <select id="select-category" name="location-search">
              <option value="">All Location</option>
              <?php
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
      <form method="post" action="../searchCompany.php">
        <div class="input-group">
          <label for="category-keyword">Category</label>
          <div class="line line-light line-light-left"></div>
          <div class="select-container">
            <select id="select-category" name="category-search">
              <option value="">All Categories</option>
              <?php
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
</div>