<?php include "../includes/session.php";

if (isset($_GET['page']) && $_GET['page'] == "delete-jobseekers")
  if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    $sql = "DELETE from users where id_user = '$id_user'";
    $conn->query($sql);

    header("Location: ../dashboard/allJobSeekers.php");
    exit();
  }
