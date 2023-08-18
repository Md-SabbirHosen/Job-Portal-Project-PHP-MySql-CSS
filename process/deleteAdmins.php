<?php include "../includes/session.php";

if (isset($_GET['page']) && $_GET['page'] == "delete-admins")
  if (isset($_GET['id'])) {
    $id_admin = $_GET['id'];

    $sql = "DELETE from admin where id_admin = '$id_admin'";
    $conn->query($sql);

    header("Location: ../dashboard/adminUsers.php");
    exit();
  }
