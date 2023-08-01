<?php include "../includes/conn.php"; ?>

<?php include "../includes/indexHeader.php" ?>

<body>
  <?php include "../includes/indexNavbar.php" ?>
  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php" ?>
    <div class="all-jobs-container">
      <div class="headline">
        <h3>All Job Posts</h3>
      </div>
      <div>
        <table>
          <thead>
            <th>#</th>
            <th>Job Title</th>
            <th>Industry</th>
            <th>Job Type</th>
            <th>Salary(&#2547;)</th>
            <th>Location</th>
            <th>City</th>
            <th>Posted By</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php
            $sql =  "SELECT * FROM job_post";
            $query = $conn->query($sql);
            //id auto increament in tables initiation
            $i = 1;
            while ($row = $query->fetch_assoc()) {
              //getting other details
              $job_id = $row['id_jobpost'];
              //city
              $city_id = $row['city_id'];
              $city_id = $conn->query("SELECT name FROM districts_or_cities WHERE id = '$city_id'");
              $city_id = $city_id->fetch_row();

              //region
              $state_id = $row['state_id'];
              $state_id = $conn->query("SELECT name FROM states WHERE id = '$state_id'");
              $state_id = $state_id->fetch_row();

              // industry
              $industry = $row['industry_id'];
              $industry = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
              $industry = $industry->fetch_row();

              //job status
              $job_status = $row['job_status'];
              $job_status = $conn->query("SELECT type FROM job_type WHERE id = '$job_status'");
              $job_status = $job_status->fetch_row();

              //company
              $company = $row['id_company'];
              $company = $conn->query("SELECT companyname FROM company WHERE id_company = '$company'");
              $company = $company->fetch_row();

              echo "
                              <tr>
                                <td>" . $i . "</td>
                                <td>" . $row['jobtitle'] . "</td>
                                <td>" . $industry[0] . "</td>
                                <td>" . $job_status[0] . "</td>
                                <td>" . $row['minimumsalary'] . " - " . $row['maximumsalary'] . "</td>
                                <td>" . $state_id[0] . "</td>
                                <td>" . $city_id[0] . "</td>
                                <td>" . $company[0] . "</td>
                                <td class='action-button' ><a class='btn btn-optional' href=''>View</a>
                                <a href='#' class='btn btn-optional'>Remove </a> 
                                </td>
                                </tr>";
              $i++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>