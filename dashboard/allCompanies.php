<?php include "../includes/conn.php"; ?>

<?php include "../includes/indexHeader.php" ?>

<body>
  <?php include "../includes/indexNavbar.php" ?>
  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php" ?>
    <div class="all-jobs-container">
      <div class="headline headline-container">
        <h3>All Companies</h3>
        <a href="../Report Generation/Admin/report-for-companies.php" class="btn"><i class="fa-solid fa-download"></i> Report</a>
      </div>
      <div>
        <table>
          <thead>
            <th>#</th>
            <th>Logo</th>
            <th>Company Name</th>
            <th>Industry</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Website</th>
            <th>Division</th>
            <th>City</th>
            <th>Address</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php
            $sql =  "SELECT * FROM company ORDER BY id_company DESC";
            $query = $conn->query($sql);
            //id auto increament in tables initiation
            $i = 1;
            while ($row = $query->fetch_assoc()) {
              $hash = md5($row['id_company']);
              //getting other detaills
              $company_id = $row['id_company'];
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

              echo "
                              <tr>
                                <td>" . $i . "</td>
                                <td><img height='50' width='50' src='../assets/images/" . $row['profile_pic'] . "'></td>
                                <td>" . $row['companyname'] . "</td>
                                <td>" . $industry[0] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['contactno'] . "</td>
                                <td>" . $row['website'] . "</td>
                                <td>" . $state_id[0] . "</td>
                                <td>" . $city_id[0] . "</td>
                                <td>" . $row['address'] . "</td>
                                <td class='action-button' >
                                <a class='btn btn-optional' href='../companyDetails.php?key=" . $hash . "&id=" . $company_id . "'>View</a>
                                <a href='../process/deleteCompany.php?key=" . $hash . "&id=" . $company_id . "&page=admin-control' class='btn btn-optional'>Remove </a> 
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