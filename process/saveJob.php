<?php include "../includes/session.php";

if (isset($_GET['id'])) {
  if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = "Please log in to save job";
    header("location: ../login.php");
    exit();
  } else {
    $id_jobpost = $_GET['id'];
    $id_company = $_GET['cid'];
    $id_user = $_SESSION['id_user'];
    $createdat = date("Y-m-d");


    $sql = "insert into saved_jobposts (id_jobpost,id_user,createdat) values('$id_jobpost','$id_user','$createdat')";

    $conn->query($sql);

    header('location: ../jobDetails.php?key=' . md5($id_jobpost) . '&id=' . $id_jobpost . '');
    exit();
  }
}
