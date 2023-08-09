<?php include "../includes/conn.php"; ?>

<?php include "../includes/indexHeader.php" ?>

<body>
  <?php include "../includes/indexNavbar.php" ?>
  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php" ?>
    <div class="all-jobs-container">
      <div class="headline headline-container">
        <h3>All Job Seekers</h3>
        <a href="../Report Generation/Admin/report-for-jobseekers.php" class="btn"><i class="fa-solid fa-download"></i> Report</a>
      </div>
      <div>
        <table>
          <thead>
            <th>#</th>
            <th>Profile Pic</th>
            <th>Fullname</th>
            <th>Gender</th>
            <th>Telephone</th>
            <th>Education</th>
            <th>Division</th>
            <th>City</th>
            <th>Address</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php
            $sql =  "SELECT * FROM users ORDER BY id_user DESC";
            $query = $conn->query($sql);
            //id auto increament in tables initiation
            $i = 1;
            while ($row = $query->fetch_assoc()) {
              //getting other detaills
              $id_user = $row['id_user'];
              //city
              $city_id = $row['city_id'];
              $city_id = $conn->query("SELECT name FROM districts_or_cities WHERE id = '$city_id'");
              $city_id = $city_id->fetch_row();

              //Division
              $state_id = $row['state_id'];
              $state_id = $conn->query("SELECT name FROM states WHERE id = '$state_id'");
              $state_id = $state_id->fetch_row();

              // education
              $education = $row['education_id'];
              $education = $conn->query("SELECT name FROM education WHERE id = '$education'");
              $education = $education->fetch_row();

              echo
              "<tr>
            <td>" . $i . "</td>
            <td><img height='50' width='50' src='../assets/images/" . $row['profile_pic'] . "'></td>
            <td>" . $row['fullname'] . "</td>
            <td>" . (isset($row['gender']) ? $row['gender'] : 'unknown') . "</td>
            <td>" . (isset($row['contactno']) ? $row['contactno'] : 'unknown') . "</td>
            <td>" . (isset($education[0]) ? $education[0] : 'unknown') . "</td>
            <td>" . (isset($division[0]) ? $division[0] : 'unknown')  . "</td>
            <td>" . (isset($city_id[0]) ? $city_id[0] : 'unknown') . "</td>
            <td>" . (isset($row['address']) ? $row['address'] : 'unknown') . "</td>
            <td class='action-button' >
            <a href='#' class='btn btn-optional'>Remove</a> 
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