<?php include "../includes/session.php";

if (isset($_GET['page'])) {
  if (isset($_GET['id'])) {
    $id_jobpost = $_GET['id'];

    $sql = "DELETE from job_post where id_jobpost = '$id_jobpost'";
    $conn->query($sql);

    header("Location: ../dashboard/allJobPost.php");
    exit();
  }
} else {
  if (isset($_GET['id'])) {
    $id_jobpost = $_GET['id'];

    $sql = "DELETE from job_post where id_jobpost = '$id_jobpost'";
    $conn->query($sql);

    header("Location: ../dashboard/manageJobs.php");
    exit();
  }
}
