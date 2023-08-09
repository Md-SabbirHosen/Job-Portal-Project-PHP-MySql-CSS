<?php include "../includes/conn.php"; ?>

<?php include "../includes/indexHeader.php" ?>

<body>
  <?php include "../includes/indexNavbar.php" ?>
  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php" ?>
    <div class="all-jobs-container">
      <div class="headline headline-container">
        <h3>All Users - Admin</h3>
        <a href="../Report Generation/Admin/report-for-admin.php" class="btn"><i class="fa-solid fa-download"></i> Report</a>
      </div>
      <div>
        <table>
          <thead>
            <th>#</th>
            <th>Profile Pic</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>DoB</th>
            <th>Address</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php
            $sql =  "SELECT * FROM admin";
            $query = $conn->query($sql);
            //id auto increament in tables initiation
            $i = 1;
            while ($row = $query->fetch_assoc()) {

              $admin_id = $row['id_admin'];

              echo "
                              <tr>
                                <td>" . $i . "</td>
                                <td><img height='50' width='50' src='../assets/images/" . $row['profile_pic'] . "'></td>
                                <td>" . $row['fullname'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . (isset($row['gender']) ? $row['gender'] : 'unknown') . "</td>
                                <td>" .  (isset($row['contactno']) ? $row['contactno'] : 'unknown')  . "</td>
                                <td>" . (isset($row['dob']) ? $row['dob'] : 'unknown') . "</td>
                                <td>" . (isset($row['address']) ? $row['address'] : 'unknown') . "</td>
                                
                                <td class='action-button' >
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