<?php include "../includes/session.php";
if (isset($_GET['id'])) {
  $id_company = $_GET['id'];

  $sql = "DELETE from company where id_company = '$id_company'";
  $conn->query($sql);

  header("Location: ../dashboard/allCompanies.php");
  exit();
}
