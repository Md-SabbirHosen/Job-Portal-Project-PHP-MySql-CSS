<?php include "../includes/session.php";

if (isset($_POST['userProfile'])) {
  $id_user = $_SESSION['id_user'];

  $sql = "DELETE  from users where id_user = '$id_user'";
  if ($conn->query($sql)) {
    echo "Account Deactivate Successfully!";
  }
}

if (isset($_POST['companyProfile'])) {
  $id_company = $_SESSION['id_company'];

  $sql = "DELETE  from company where id_company = '$id_company'";
  if ($conn->query($sql)) {
    echo "Account Deactivate Successfully!";
  }
  $sql = "DELETE  from job_post where id_company = '$id_company'";
  $conn->query($sql);
}

if (isset($_POST['adminProfile'])) {
  $id_admin = $_SESSION['id_admin'];

  $sql = "DELETE  from admin where id_admin = '$id_admin'";
  if ($conn->query($sql)) {
    echo "Account Deactivate Successfully!";
  }
}

include "./logout.php";
header('location: ../index.php');

exit();
